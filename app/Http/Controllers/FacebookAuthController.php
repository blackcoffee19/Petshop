<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;


class FacebookAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook(){
        try{
            $facebook_user = Socialite::driver('facebook')->user();
            dd($facebook_user);
            $user = User::where('google_id','=',$facebook_user->getId())->first();
            if(!$user){
                $new_user = new User();
                $new_user->name = $facebook_user->getName();
                $new_user->email =$facebook_user->getEmail();
                $new_user->google_id = $facebook_user->getId();
                $new_user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                $new_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $new_user->save();
                if(Session::has("cart")){
                    $cart_session = Session::get("cart");
                    $user = User::where('google_id','=',$facebook_user->getId())->first();
                    foreach($cart_session as $key => $value){
                        $addToUserCart = new Cart();
                        $orde_code ="user_".$facebook_user->getId()."_0";
                        $addToUserCart->order_code = $orde_code;
                        $addToUserCart->id_user = $user->id_user;
                        $addToUserCart->id_product = $value["id_product"];
                        $addToUserCart->qty = $value["qty"];
                        $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $addToUserCart->save();
                    }
                    Session::remove("cart");
                };
                Auth::login($new_user);
                return redirect('/');
            }else{
                if(Session::has("cart")){
                    $cart_session = Session::get("cart");
                    foreach($cart_session as $key => $value){
                        $foundPro = $user->Cart->where('id_product','=',$value["id_product"])->first();
                        if($foundPro != null){
                            if(($foundPro->qty + $value["qty"]) >= $user->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity){
                                $foundPro->qty = $user->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity;
                            }else{
                                $foundPro->qty += $value["qty"];
                            };
                            $foundPro->save();
                        }else{
                            $addToUserCart = new Cart();
                            $user_code = $user->phone_number? $user->phone_number: $user->google_id;
                            $orde_code ="user_".$user_code."_".count($user->Order);
                            $addToUserCart->order_code = $orde_code;
                            $addToUserCart->id_user = $user->id_user;
                            $addToUserCart->id_product = $value["id_product"];
                            $addToUserCart->qty = $value["qty"];
                            $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                            $addToUserCart->save();
                        }
                    }
                    Session::remove("cart");
                };
                Auth::login($user);
                return redirect('/');
            }
        }catch(\Throwable $th){
            dd('Something went wrong '.$th->getMessage());
        }
    }
}
