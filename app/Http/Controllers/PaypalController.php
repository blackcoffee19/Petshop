<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Product;
use Carbon\Carbon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function processTransaction(Request $req){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        if(Str::length($req['instruction'])>0){
            Session::put('instructions',$req['instruction']);
        };
        Session::put('shipfee',$req['shipfee']);
        Session::put('delivery_method',$req['delivery_method']);
        if(Auth::check()){
            Session::put('select_add',floatval($req['select_address']));
            $total = 0;
            foreach(Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get() as $cart){
                $total += $cart->Product->sale > 0 ? $cart->Product->per_price*(1-$cart->Product->sale/100)*$cart->amount :$cart->Product->per_price *$cart->amount; 
            }
            if(Str::length($req['coupon'])>0){
                $coupon = Coupon::where('code','=',$req['coupon'])->first();
                $total = $coupon->discount >=10 ? $total*(1-$coupon->discount/100) : $total - $coupon->discount;
                Session::put('code_coupon',$req['coupon']);
            }
            $total += floatval($req['shipfee']);
            
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => round($total,2),
                        ]
                    ]
                ]
            ]);
        }else{
            Session::put('name',$req['name']);
            Session::put('phone',$req['phone']);
            Session::put('email',$req['email']);
            Session::put('province',$req['province']);
            Session::put('district',$req['district']);
            Session::put('address',$req['address']);
            Session::put('ward',$req['ward']);
            
            $value = 0;
            foreach(Session::get('cart') as $key=> $cart){
                $value += $cart['sale']>0?$cart['per_price']*(1-$cart['sale']/100)*$cart['amount']:$cart['per_price']*$cart['amount'];
            }
            $value+=floatval($req['shipfee']);
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => round($value,2)
                        ]
                    ]
                ]
            ]);
            // $response2 = $provider->createOrder([
            //     "intent" => "CAPTURE",
            //     "application_context" => [
            //         "return_url" => route('successTransaction'),
            //         "cancel_url" => route('cancelTransaction'),
            //     ],
            //     "purchase_units" => $purchase
            // ]);
            // dd($response1,$response2);
        }
        
        if (isset($response['id']) && $response['id'] != null) {

            foreach ($response['links'] as $links) {
                
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect('index')
                ->with('error', 'Something went wrong.');

        } else {
            dd($response);
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            //  Session::put('success_paypal', true);
            $order = new Order();
            if(Auth::check()){
                $order->id_user = Auth::user()->id_user;
                $order_code = "USR".Auth::user()->id_user."_".count(Auth::user()->Order);
                $order->order_code = $order_code;
                $address = Address::find(Session::get('select_add'));
                $order->receiver = $address['receiver']; 
                $order->phone = $address['phone'];
                $order->email = $address['email'];
                $order->address = $address['address'].", ".$address['ward'].", ".$address['district'].", ".$address['province'];
                $order->code_coupon = Session::has('code_coupon')?Session::get('code_coupon'):null;
                $order->method = 'paypal';
                $order->delivery_method = Session::get('delivery_method');
                $order->instruction = Session::has('instructions')?Session::get('instructions'):null;
                foreach(Cart::where('order_code','=',null)->where('id_user','=',Auth::user()->id_user)->get() as $cart){
                    $cart->Product->quantity-=$cart->amount;
                    $cart->Product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $cart->Product->save();
                    $cart->order_code = $order_code;
                    $cart->price = $cart->Product->per_price;
                    $cart->sale = $cart->Product->sale;
                    $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $cart->save();
                }
                $order->shipping_fee = floatval(Session::get('shipfee'));
                $order->status = 'unconfirmed';
                $order->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $order->save();
                Session::forget('instructions');
                Session::forget('select_add');
                Session::forget('shipfee');
                Session::forget('code_coupon');
                Session::forget('coupon');
                return redirect()
                    ->route('accountorder')
                    ->with('paypal_success', true);
            }else{
                $nnum = count(Order::where('order_code','LIKE','%GUT%')->get());
                $order_code = "GUT_".$nnum;
                while(Order::where('order_code','=',$order_code)->first()){
                    $nnum++;
                    $order_code ="GUT_".$nnum;
                }
                $current_guest_cart = Session::get('cart');
                foreach($current_guest_cart as $key => $value){
                    $guest_cart = new Cart();
                    $guest_cart->order_code=$order_code;
                    $guest_cart->id_product= $value["id_product"];
                    $guest_cart->price = $value["per_price"];
                    $guest_cart->sale = $value["sale"];
                    $guest_cart->amount = $value["amount"];
                    $guest_cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $guest_cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $guest_cart->save();
                    $product = Product::where('id_product','=',$value["id_product"])->first();
                    $product->quantity -=$value["amount"];
                    $product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $product->save();
                    $comment  = new Comment();
                    $comment->id_product = $value["id_product"];
                    $comment->name="Guest";
                    $comment->verified = true;
                    $comment->rating = 5;
                    $comment->phone = Session::get('phone');
                    $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $comment->save();
                }
                $order->order_code = $order_code;
                $order->receiver = Session::get('name');
                $order->phone = Session::get('phone');
                $order->email = Session::get('email');
                $order->address = Session::get('address').", ".Session::get('ward').", ".Session::get('district'). ", ".Session::get('province');
                $order->method = 'paypal';
                $order->delivery_method = Session::get('delivery_method');
                $order->instruction = Session::has('instructions')?Session::get('instructions'):null;
                $order->shipping_fee = round(floatval(Session::get('shipfee')),2);
                $order->status = 'unconfirmed';
                $order->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $order->save();
                Session::forget('instructions');
                Session::forget("cart");
                Session::forget('name');
                Session::forget('phone');
                Session::forget('email');
                Session::forget('province');
                Session::forget('district');
                Session::forget('address');
                Session::forget('ward');
                Session::forget('delivery_method');
                Session::forget('shipfee');
                return redirect()
                    ->route('home')
                    ->with('paypal_success', true);
            }
        } else {
            return redirect()
                ->route('order')
                ->with('paypal_error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
