<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class UpdateCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has("cart")){
            $new_cart = [];
            foreach(Session::get("cart") as $key => $value){
                $check_product = Product::find($value["id_product"]);
                if($check_product && $check_product->status){
                    $imag= count($check_product->Library)>0? $check_product->Library[0]->image : $value['image'];
                    $new = ["id_product"=>$value["id_product"],"amount"=>$value["amount"],"per_price"=>$check_product->per_price,"name"=>$check_product->product_name,"max"=>$check_product->quantity,"image"=>$imag,'sale'=>$check_product->sale];
                    array_push($new_cart,$new);
                }
            };
            Session::put("cart",$new_cart);
        }else if(Auth::check() && Auth::user()->admin == '0'){
            $current_cart = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($current_cart as $cart){
                $product_ck = Product::find($cart->id_product);
                if($product_ck && $cart->Product->status){
                    $cart->price = $cart->Product->price;
                    $cart->sale = $cart->Product->sale;
                    $cart->save();
                }else{
                    $cart->delete();
                }
            }
        }
        return $next($request);
    }
}
