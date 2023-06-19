<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\ContactMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Breed;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Favourite;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\TypeProduct;
use App\Models\User;
use App\Models\Slide;
use App\Models\Like;
use App\Models\Banner;
use App\Models\News;
use App\Models\Message;
use App\Models\Groupmessage;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
class MyController extends Controller
{
    public function homePage(){
        
        $slides = Slide::orderBy('updated_at','desc')->limit(5)->get();
	    $banners = Banner::all();
        $types= TypeProduct::all();
        $breeds = Breed::all();
        $popular_pets= Product::where('quantity','>',0)->inRandomOrder()->limit(10)->get();
        $sale_pets = Product::where('quantity','>',0)->where('sale','>','0')->inRandomOrder()->limit(3)->get();
        return view("frontend.home_page",compact('popular_pets','sale_pets','slides','banners','breeds','types'));
    }
    public function policy(){
        return view('frontend.policy');
    }
    public function productList(Request $req,$type_name = null,$breed_name = null){
        $list_pets = [];
        $sort_type = $req->sortT?$req->sortT:"asc"; 
        $breed_get= [];
        $price_get=0;
        $age_get=0;
        $types = TypeProduct::all();
        // Ưu tiên Search trước
        //Search by name
        if($req->search2 != ""){
            $searchStr = preg_replace('/[^A-Za-z0-9\-]/', '', $req->search2);
            $list_pets = Product::where('product_name','LIKE','%'.$searchStr.'%')->orderBy('per_price',$sort_type)->orderBy('quantity','desc')->get();
        
        // Sort theo loại loại, giá, độ tuổi (do Product là động vật) (lấy giá trị của checkbox)
        }else if($req->breed != null || $req->price!=""||$req->age!=""){
            $max_age = $req->age == "" ? 9999:intval($req->age);
            $max_price = $req->price == ""? 9999:intval($req->price);
            $price_get = $req->price != ""?$req->price:0;
            $age_get= $req->age!=""?$req->age:0;
            if($req->breed == null){
                $list_pets = Product::where('age','<',$max_age)->where('per_price','<',$max_price)->orderBy('per_price',$sort_type)->orderBy('quantity','desc')->get();
            }else{
                $breed_get=$req->breed;
                $list_pets = Product::whereIn('id_breed',$req->breed)->where('age','<',$max_age)->where('per_price','<',$max_price)->orderBy('per_price',$sort_type)->orderBy('quantity','desc')->get();
            }
        // Filter theo Giống động vật và Loại động vật 
        }else{
            $id_breed = $breed_name != null? DB::table('breeds')->select('id_breed')
                                                    ->where('breed_name','=',$breed_name)->get()[0]->id_breed : null;
            $id_type = $type_name != null? DB::table('type_products')->select('id_type')
                                                    ->where('name_type','=',$type_name)->get()[0]->id_type : null;
            if($id_breed!= null && $id_type != null){
                $list_pets = Product::where('id_breed','=',$id_breed)->orderBy('per_price',$sort_type)->get();
            }else if($id_type != null) {
                $list_breed = DB::table('breeds')->where('id_type_product','=',$id_type)->get('id_breed');
                $arr= [];
                foreach($list_breed as $p){
                    array_push($arr,$p->id_breed);
                }
                $list_pets = Product::whereIn('id_breed',$arr)->orderBy('per_price',$sort_type)->get();
            }else{
                $list_pets = Product::orderBy('per_price',$sort_type)->get();
            }
        }
        return view('frontend.product_list',compact('list_pets','sort_type','breed_get','price_get','age_get','type_name','breed_name','types'));
    }
    public function productDetail($id){
        if($id == null){
            return redirect('/not_found')->with("error","Product Not Found");
        }else{
            $pet = Product::where('id_product','=',$id)->first();
            $id_bre = DB::table('products')->select('id_breed')
                                            ->where('id_product','=',$id)->first();
            $list_relate= Product::where('id_breed',$id_bre->id_breed)
                                                ->whereNot('id_product','=',$id)
                                                ->inRandomOrder()->limit(5)->get();
            $comments = Comment::where('id_product','=',$id)->where('reply_comment','=',null)->get();
            $types= TypeProduct::all();
            return view('frontend.product_detail2',compact('pet','list_relate','comments','types'));
        }
    }
    public function removeCart($id){
        if(Auth::check()){
            $item = Cart::find($id);
            $item->delete();
        }
        if(Session::has("cart")){
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i != $id){
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],"sale"=>$session_cart[$i]['sale']]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back();
    }
    public function editCmt(Request $req,$id){
        $cmt = Comment::find($id);
        if(isset($req['rating_cmt'])){
            $cmt->rating = $req['rating_cmt'];
        };
        $cmt->context = $req['content_cmt'];
        $cmt->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $cmt->save();
        return redirect()->back(); 
    }
    public function deleteCmt($id){
        $comt = Comment::find($id);
        $comt->delete();
        return redirect()->back();
    }
    public function addToCart(Request $req){
        $foundPro =[];
        $req->validate([
            "quan" => "required"
        ],[
            "quan.required"=>"You need choose at least 1 item",
        ]);
        $product = Product::where('id_product','=',$req["id_pro"])->first();
        $maxQuan = $product->quantity;
        $price = $product->per_price;
        $name = $product->product_name;
        $sale = $product->sale;
        $imgPro = $product->Library[0]->image;
        if(Auth::check()){
            $foundPro = Auth::user()->Cart->where('id_product','=',$req["id_pro"])->where('order_code','=',null)->first();
            if($foundPro){
                if($foundPro->amount == $foundPro->Product->quantity){
                    return redirect()->back()->with(["warning"=>"Add to cart failue! You got maximum"]);
                }else{
                    $sum_quant = intval($req["quan"])+ $foundPro->amount; 
                    if($sum_quant > $maxQuan){
                        $sum_quant = $maxQuan;
                    };
                    $foundPro->amount  = $sum_quant;
                    $foundPro->save();
                }
            }else{
                $cart = new Cart();
                $cart->id_user = Auth::user()->id_user;
                $cart->order_code = null;
                $cart->id_product = $req->id_pro;
                $cart->amount = $maxQuan < intval($req["quan"])?$maxQuan:intval($req["quan"]);
                $cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
        }else if(Session::has("cart")){
            $check = true;
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($value["id_product"] == $req["id_pro"]){
                    $addQuan = ($value["amount"]+intval($req["quan"])) > $maxQuan ? $maxQuan : $value["amount"]+intval($req["quan"]);
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$maxQuan,"image"=>$imgPro,'sale'=>$value['sale']]);
                    $check = false;
                }else{
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$req["id_pro"],"amount"=>intval($req["quan"]),"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro,'sale'=>$sale];
                Session::push("cart",$new);
            }else{
                Session::put("cart",$arr_new);
            }
        }else{
            $cart_session = ["id_product"=>$req["id_pro"],"amount"=>intval($req["quan"]),"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro,'sale'=>$sale];
            Session::push("cart",$cart_session);
        };
        return redirect()->back()->with(["message"=>"Add to cart successfull"]);
    }
    public function addToCart2($id){
        $product= Product::find($id);
        $sale = $product->sale;
        $num =0;
        if(Auth::check()){
            $foundPro = Auth::user()->Cart->where('id_product','=',$id)->where('order_code','=',null)->first();
            if($foundPro){
                if($foundPro->amount == $foundPro->Product->quantity){
                    return redirect()->back()->with(["warning"=>"Add to cart failue! You got maximum"]);
                }else{
                    $foundPro->amount+=1;
                    $foundPro->save();
                }
            }else{
                $cart = new Cart();
                $cart->id_user = Auth::user()->id_user;
                $cart->order_code = null;
                $cart->id_product = $id;
                $cart->amount = 1;
                $cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
            foreach(Auth::user()->Cart->where('order_code','=',null) as $cart){
                $num += $cart->amount;
            }
        }else if(Session::has("cart")){
            $check = true;
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($value["id_product"] == $id){
                    $addQuan = ($value["amount"]+intval($id)) > $product->quantity ? $product->quantity : $value["amount"]+1;
                    $num+=$addQuan;
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$value["image"],'sale'=>$sale]);
                    $check = false;
                }else{
                    $num+=$value["amount"];
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$id,"amount"=>1,"per_price"=>$product->per_price,"name"=>$product->product_name,"max"=>$product->quantity,"image"=>$product->Library[0]->image,'sale'=>$sale];
                $num++;
                array_push($arr_new,$new);
                Session::put("cart",$arr_new);
            }else{
                Session::put("cart",$arr_new);
            }
        }else{
            $num++;
            $cart_session = ["id_product"=>$id,"amount"=>1,"per_price"=>$product->per_price,"name"=>$product->product_name,"max"=>$product->quantity,"image"=>$product->Library[0]->image,'sale'=>$sale];
            Session::push("cart",$cart_session);
        };
        echo $num;
    }
    public function ajax_listorder($sort){
        $html = "";
        $orders = Order::where('id_user','=',Auth::user()->id_user)->orderBy('updated_at',$sort)->get();
        if(count($orders) ==0){
            $html.="<tr><td colspan='5'>There are no order</td></tr>";
        }
        foreach($orders as $order){
            $html .="<tr><td>".date('d/m/Y', strtotime($order->created_at))."</td><td><table class='table'>";
            foreach($order->Cart as $cart){
                $html .= "<tr><td style='width:30%'><img src='resources/image/pet/".$cart->Product->Library[0]->image."' class='border rounded me-4' height='100' style='max-width: 100;'></td><td style='width: 60%'>".$cart->Product->product_name."</td><td style='width: 10%'>".$cart->amount."</td></tr>";
            }
            if($order->status == 'confirmed' || $order->status == 'unconfimred'){
                $html .= "</table></td><td style='font-size:1.3rem'>".$order->status."</td><td><a data-bs-toggle='modal' class='user_editorder' data-bs-target='#editOrder' data-idorder='".$order->id_order."'><i class='fa-solid fa-file-pen fa-xl'></i></a></td><td><a data-idorder='".$order->id_order."' class='cancelOrder'><i class='fa-solid fa-trash-can-xmark fa-xl' style='color: #5e5c64;'></i></a></td></tr>";
            }else{
                $html .= "</table></td><td colspan='3' style='font-size:1.3rem'>".$order->status."</td></tr>";
            }
        }
        echo $html;
    }
    public function ajax_getOrder($id){
        $order = Order::find($id);
        if($order->Coupon){
            $order->name_coupon = $order->Coupon->title;
        }else{
            $order->name_coupon = "NO COUPON";
        }
        echo $order;
    }
    
    public function cancel_order(Request $req){
        $order = Order::find($req['id_order']);
        $order->status = 'cancel';
        $order->save();
        $new = new News();
        $new->order_code =$order->order_code;
        $new->link = $order->order_code;
        $new->send_admin = true;
        $new->title = "Cancel Order";
        $new->save();
    }
    public function post_urseditorder(Request $req){
        $order = Order::find($req['id_orderedit']);
        $order->cus_name = $req['edit_cusname'];
        $order->cus_address = $req['edit_cusaddr'];
        $order->cus_phone = $req['edit_cusphone'];
        $order->cus_email = $req['edit_email'];
        $order->save();
        $new = new News();
        $new->order_code =$order->order_code;
        $new->link = $order->order_code;
        $new->send_admin = true;
        $new->title = "Customer edited their Order";
        $new->save();
        return redirect()->back()->with('message','Edit Order successfull');
    }
//NEED CHANGE BUTTON ADD PRODUCT BY AJAX
    public function addMore($id){
        if(Auth::check()){
            $product = Cart::find($id);
            if($product->Product->quantity > $product->amount){
                $product->amount++;
                $product->save();
            }
        }
        else{
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i == $id){
                    $addOne = $session_cart[$i]["amount"]+1;
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$addOne,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back()->with('message',"Add one more pet into your cart successfully!");
    }
    public function minusOne($id){
        if(Auth::check()){
            $product = Cart::find($id);
            if($product->amount ==1){
                $product->delete();
            }else{
                $product->amount--;
                $product->save();
            }
        }else{
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i == $id){
                    $minus = $session_cart[$i]["amount"]-1;
                    if($minus>0){
                        array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$minus,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                    }
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back();
    }
    public function postComment(Request $req, $id = null){
        if($id ==null){
            $new_cmt = new Comment();
            $new_cmt->id_user = Auth::user()->id_user;
            $new_cmt->id_product = $req['id_product'];
            $new_cmt->context = $req["comment"];
            $new_cmt->verified = false;
            $new_cmt->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $new_cmt->save();

        }else{
            $reply = new Comment();
            $reply->id_user = Auth::user()->id_user;
            $reply->id_product = $req['reply_id_product'];
            $reply->context= $req["reply_context"];
            $reply->verified = false;
            $reply->reply_comment = intval($id);
            $reply->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $reply->save();
        }
        return redirect()->back();
    }
    public function contactUs(){
        return view('frontend.contact');
    }
    public function get_signUp(){
        $sign= "signup";
        return view('frontend.signin',compact('sign'));
    }
    public function post_signUp(Request $req){
        $new_user = new User();
        $new_user->name = $req["user_fullname"];
        $checkEmail = User::where('email','=',$req["user_email"])->get();
        if(count($checkEmail)>0){
            return redirect()->back()->with(["error"=>"Email has signed up. Choose another email or sign in"]);
        }
        $new_user->email = $req["user_email"];
        $new_user->password = bcrypt($req["user_pass2"]);
        $new_user->phone_number = $req["user_phone"];
        if($req->hasFile('user_img')){
            $file = $req->file('user_img');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" && $type != "png" && $type != "jpeg" && $type!= "webp"){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            }
            $name = $file->getClientOriginalName();
            $num=0;
            $image_user = "user_".$num."_".$name;
            while(file_exists('resources/image/user/'.$image_user)){
                $num++;
                $image_user = "user_".$num."_".$name;
            };
            $file->move('resources/image/user/',$image_user);
            $new_user->image = $image_user;
        }else{
            $new_user->image= null;
        };
        $new_user->admin = 0;
        $new_user->email_verification_token =Str::random(32);
        $new_user->created_at= Carbon::now()->format('Y-m-d H:i:s');
        $new_user->save();
        $vali = ["email"=>$new_user->email,"password"=>$req["user_pass2"]];
        if(Auth::attempt($vali)){
            if(Session::has("cart")){
                $cart_session = Session::get("cart");
                foreach($cart_session as $key => $value){
                    $addToUserCart = new Cart();
                    $addToUserCart->order_code = null;
                    $addToUserCart->id_user = $new_user->id_user;
                    $addToUserCart->id_product = $value["id_product"];
                    $addToUserCart->amount = $value["amount"];
                    $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $addToUserCart->save();            
                }
                Session::forget("cart");
            };
            return redirect('/');
            return redirect('/signup/confirm')->with('success_signup','Congratulation! You signed up successfully');
        }else{
            return redirect()->back()->with('error','Sign up failue. Try again');
        }
    }
    public function get_signupconfirm(){
        return view('frontend.success');
    }
    public function send_verifyEmail(){
        $user = User::find(Auth::user()->id_user);
        $user->email_verification_token =Str::random(32);
        $user->save();
        $mailData = [
            'title' => 'Mail to Verification',
            'url' => route('verify',$user->email_verification_token)
        ];
        try {
            Mail::to($user->email)->send(new VerificationEmail($mailData));
        } catch (\Throwable $th) {
            echo "Send verify email unsuccessfully";
        }
        echo "Mail has been sending please check your email to verified the account";
    }
    public function verifyEmail($token = null){
        if($token == null) {
    		return redirect('signin')->with('verified_error', 'Invalid Login attempt');
        }
        $user = User::where('email_verification_token',$token)->first();
        if(!$user){
            return redirect('signin')->with('verified_error', 'Invalid Login attempt');
        }
        $user->email_verified = true;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->email_verification_token = '';
        $user->save();
        return redirect('/')->with('verified', 'Your account is activated, you can log in now');
    }
    public function get_signIn(){
        $sign = "signin";
        return view('frontend.signin',compact('sign'));
    }
    public function post_signIn(Request $req){
        $vali = $req->validate([
            "username" => "required",
            "pass1" => "required"
        ],[
            "username.required" => "You must enter email",
            "pass1.required" => "You must enter password"
        ]);
        $arr_vali = ["email"=>$vali["username"],"password"=>$vali["pass1"]];
        if(Auth::attempt($arr_vali)){
            if(Session::has("cart")){
                $cart_session = Session::get("cart");
                foreach($cart_session as $key => $value){
                    $foundPro = Auth::user()->Cart->where('id_product','=',$value["id_product"])->where('order_code','=',null)->first();
                    if($foundPro){
                        if(($foundPro->amount + $value["amount"]) >= Auth::user()->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity){
                            $foundPro->amount = Auth::user()->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity;
                        }else{
                            $foundPro->amount += $value["amount"];
                        };
                        $foundPro->save();
                    }else{
                        $addToUserCart = new Cart();
                        $addToUserCart->order_code = null;
                        $addToUserCart->id_user = Auth::user()->id_user;
                        $addToUserCart->id_product = $value["id_product"];
                        $addToUserCart->amount = $value["amount"];
                        $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $addToUserCart->save();
                    }
                }
                Session::forget("cart");
            };
            return redirect('/');
        }else{
            return redirect()->back()->with(["message"=>"Sign in failue. Password or username incorrect"]);
        };
    }
    public function get_profie(){
        return view('frontend.profie');
    }
    public function post_editprofie(Request $req){
        $req->validate([
            "new_password2"=>"same:new_password1",
        ],[
            "new_password2.same"=>"Re-password not match"
        ]);
        $user = User::find(Auth::user()->id_user);
        $user->name = $req['new_name'];
        if($req['new_email'] != $user->email){
            $user->email = $req['new_email'];
            $user->email_verified = false;
        };
        $checkPhone = User::where('phone','=',$req['new_phone'])->where('id_user','!=',Auth::user()->id_user)->get();
        if(count($checkPhone) == 0 && !$user->phone){
            $user->phone = $req['new_phone'];
            $comment = Comment::where('name','=','Guest')->where('phone','=',$req['new_phone'])->get();
            foreach($comment as $cmt){
                $cmt->name=null;
                $cmt->id_user = $user->id_user;
                $cmt->phone = null;
                $cmt->save();
            }
            $orders = Order::where('id_user','=',null)->where('phone','=',$req['new_phone'])->get();
            $num=0;
            foreach($orders as $order){
                $cr_order_code = "USR".$user->id_user."_".$num;
                foreach($order->Cart as $cart){
                    $cart->order_code = $cr_order_code;
                    $cart->id_user = $user->id_user;
                    $cart->save();
                }
                $order->order_code = $cr_order_code;
                $order->id_user = $user->id_user;
                $order->save();
                $num++;
            }
        }else if(count($checkPhone) == 0){
            $user->phone = $req['new_phone'];
        }else{
            return redirect()->back()->with('error','Error: This phone number has signed by another account');
        }
        if(isset($req['changeImg']) && $req->hasFile('profie_image')){
            $file = $req->file('profie_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            }
            $name=$file->getClientOriginalName();
            $num=0;
            $hinh = "user_".$num."_".$name;
            while(file_exists('resources/image/user/'.$hinh)){
                $num++;
                $hinh = "user_".$num."_".$name;
            };
            $file->move('resources/image/user/',$hinh);
            $user->avatar=$hinh;
        }
        $user->save();
        $news = News::where('link','=','accountsetting')->where('id_user','=',Auth::user()->id_user)->first();
        if($user->password && $user->phone && $news){
            $news->delete();
        };
        return redirect()->back()->with('message','Change profie successfully');
    }
    public function check_password(Request $req){
        $user = User::find(Auth::user()->id_user);
        if (Hash::check($req['current_password'], $user->password)) {
            echo "Accept";
        }else{
            echo "Incorrect password";
        }
    }
    public function post_changepassword(Request $req){
        $user = User::find(Auth::user()->id_user);
        $user->password = bcrypt($req['new_password']);
        $user->save();
        $news = News::where('link','=','accountsetting')->where('id_user','=',Auth::user()->id_user)->first();
        if($user->password && $user->phone && $news){
            $news->delete();
        };
        return redirect()->back()->with('message','Change Password successfully');
    }
    public function get_orderhistory(){
        if(Auth::user()->admin != '2'){
            $orders = Order::where('id_user','=',Auth::user()->id_user)->orderBy('created_at','desc')->paginate(6);
            foreach($orders as $order){
                $sum = 0;
                foreach($order->Cart as $cart){
                    $sum += $cart->price*(1 - $cart->sale/100)*$cart->amount;
                }
                if($order->Coupon){
                    if($order->Coupon->discount >= 10){
                        $sum *= (1-$order->Coupon->discount /100);
                    }else{
                        $sum-=$order->Coupon->discount;
                    }
                }
                $sum += $order->shipping_fee;
                $order->total = $sum;
            }
        }else{
            $orders = Order::orderBy('created_at','desc')->paginate(6);
            foreach($orders as $order){
                $sum = 0;
                foreach($order->Cart as $cart){
                    $sum += $cart->sale > 0? $cart->price*(1 - $cart->sale/100)*($cart->amount): $cart->price*($cart->amount);
                }
                if($order->Coupon){
                    if($order->Coupon->discount >= 10){
                        $sum *= (1-$order->Coupon->discount /100);
                    }else{
                        $sum-=$order->Coupon->discount;
                    }
                }
                $sum += $order->shipping_fee;
                $order->total = $sum;
            }
        }
        return view('frontend.user_history',compact('orders'));
    }
    public function get_address(){
        return view('frontend.user_address');
    }
    public function setdefault_address($id){
        foreach(Auth::user()->Address as $add){
            if($add->id_address != $id && $add->default ){
                $add->default = false;
                $add->save();
            }
        }
        $address = Address::where('id_user','=',Auth::user()->id_user)->where('id_address','=',$id)->first();
        $address->default = true;
        $address->save();
        return redirect()->back()->with('message','Change Default Address successfully');
    }
    public function check_email($email){
        $checkEmail = User::where('email','=',$email)->get();
        $msg = "";
        if(count($checkEmail)>0){
            $msg = "existed";
        }
        echo $msg;
    }
    public function check_phone($phone){
        $checkPhone = User::where('phone','=',$phone)->get();
        $msg = "";
        if(count($checkPhone)>0){
            $msg = "existed";
        }
        echo $msg;
    }
    public function signOut(){
        Auth::logout();
        return redirect('/');
    }
    public function get_checkout(){
        $carts=[];
        $guest_order = "";
        if(!Auth::check()){
            $carts = Session::get("cart"); 
        }else{
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
        }
        $types = TypeProduct::all();
        return view('frontend.checkout',compact('carts','types')); 
    }
    public function add_address(Request $req){
        $newAdd = new Address();
        $newAdd->id_user =Auth::user()->id_user;
        $newAdd->receiver = $req['nameReciever'];
        $newAdd->address = $req['addressReciever'];
        $newAdd->ward = $req['ward'];
        $newAdd->district = $req['district']; 
        $newAdd->province = $req['province'];
        $newAdd->phone = $req['phoneReciever'];
        $newAdd->email = $req['emailReciever'];
        $newAdd->district_id = intval($req['district_id']);
        $newAdd->ward_id = intval($req['ward_id']);
        $newAdd->province_id = intval($req['province_id']);
        if(isset($req['saveAddress'])){
            $defautlAddress = Address::where('id_user','=',Auth::user()->id_user)->where('default','=',true)->first();
            if($defautlAddress){
                $defautlAddress->default = false;
                $defautlAddress->save();
            }
            $newAdd->default = true;
        };
        $newAdd->save();
        return redirect()->back();
    }
    public function remove_address($id){
        $add = Address::where('id_address','=',$id)->first();
        $add->delete();
        $address = Address::where('id_user','=',Auth::user()->id_user)->first();
        $address->default = true;
        $address->save();
        return redirect()->back()->with('message','Delete Address successfully');
    }
    public function get_addressdetail($id){
        $address = Address::find($id);
        echo $address;
    }
    public function model_coupon($code){
        $coupon = Coupon::where('code','=',$code)->where('status',true)->first();
        $coupon->used = count(Order::where('id_user','=',Auth::user()->id_user)->where('code_coupon','=',$code)->where('status','<>','cancel')->get());
        if($coupon){
            echo $coupon;
        }else{
            echo '';
        };
    }
    public function get_order(){
        if(Session::has('coupon')){
            $coupon =Coupon::find(Session::get('coupon')); 
            $coupon->freeship = Coupon::where('id_coupon','=',Session::get('coupon'))->where('code','LIKE','%FREESHIP%')->first() ? true :false;
        }else{
            $coupon = null;
        }
        $carts=[];
        $guest_order = "";
        if(!Auth::check()){
            $carts = Session::get("cart");
            $address = null;
        }else{
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            $address = Auth::user()->Address->sortByDesc('default');
            $check = true;
            foreach($address as $add){
                if($add->default){
                    $check = false;
                }
            };
            if($check && count($address)>0){
                $address[0]->default = true;
                $address[0]->save();
            }
        }
        return view('frontend.order',compact('carts','address','coupon'));
    }
    public function post_order(Request $req){
        $new_order = new Order();
        if(Auth::check()){
            $new_order->id_user = $req["id_user"];
            $new_order->order_code ="USR".Auth::user()->id_user."_".count(Auth::user()->Order);
            $address = Address::find($req['select_address']);
            $new_order->receiver = $address['receiver']; 
            $new_order->phone = $address['phone'];
            $new_order->email = $address['email'];
            $new_order->address = $address['address'].", ".$address['ward'].", ".$address['district'].", ".$address['province'];
            $new_order->code_coupon = $req['code_coupon'];
        }else{
            $nnum = count(Order::where('order_code','LIKE','%GUT%')->get());
            $order_code = "GUT_".$nnum;
            while(Order::where('order_code','=',$order_code)->first()){
                $nnum++;
                $order_code ="GUT_".$nnum;
            };
            $new_order->order_code = $order_code;
            $new_order->receiver = $req["name"];
            $new_order->address = $req["address"].', '.$req["ward"].','.$req["district"].', '.$req["province"];
            $new_order->phone = $req["phone"];
            $new_order->email = $req["email"];
        }
        $new_order->shipping_fee =$req["shipment_fee"];
        $new_order->delivery_method = $req['delivery_method'];
        $new_order->status = "unconfirmed";
        $new_order->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_order->save();
        $sendadmin = new News();
        $sendadmin->order_code =$new_order->order_code;
        $sendadmin->link = $new_order->order_code;
        $sendadmin->send_admin = true;
        $sendadmin->title = "New Order";
        $sendadmin->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $sendadmin->save();
        if(Auth::check()){
            $current_carts = Cart::where('order_code','=',null)->where('id_user','=',Auth::user()->id_user)->get();
            foreach($current_carts as $cart){
                $cart->Product->quantity-=$cart->amount;
                $cart->Product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->Product->save();
                $cart->order_code = $new_order->order_code;
                $cart->price = $cart->Product->price;
                $cart->sale = $cart->Product->sale;
                $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
        }else{
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
            }
            Session::forget("cart");
            Session::forget('coupon');
        }
        return redirect('/')->with(["message"=>"Order Successfully, plz wait for Admin Confirm"]);
    }
    public function modal_product($id){
        $product = Product::find($id);
        $product->breed = Product::find($id)->Breed->breed_name;
        $product->type = Product::find($id)->Breed->TypeProduct->name_type;
        $product->favourite = Auth::check()? (count(Favourite::where('id_user','=',Auth::user()->id_user)->where('id_product','=',$id)->get())>0? true: false):false;
        $rating = 0;
        $commt = Comment::where('rating','!=',null)->where('id_product','=',$id)->get();
        if(count($commt)>0){
            foreach( $commt as $rate){
                $rating += $rate->rating;
            }
            $rating /= count($commt);
        }
        $product->rating = $rating;
        $product->sold = count($commt);
        $arrImg = [];
        foreach($product->Library as $img){
            $arrImg[] = $img->image;
        }
        $product->images = $arrImg;
        echo $product;
    }
    public function add_favourite($id){
        $product = Product::find($id);
        $found_fav = Favourite::where('id_user','=',Auth::user()->id_user)->where('id_product','=',$id)->first();
        if(!$found_fav){
            $new_fav = new Favourite();
            $new_fav->id_user = Auth::user()->id_user;
            $new_fav->id_product = $product->id_product;
            $new_fav->created_at=Carbon::now()->format('Y-m-d H:i:s');
            $new_fav->save();
        }else{
            $found_fav->delete();
        }
        $num = count(Auth::user()->Favourite);
        echo $num;
    }
    public function get_favourite(){
        $favourites = Auth::user()->Favourite;
        return view('frontend.favourite',compact('favourites'));
    }
    public function post_favourite(Request $req){
        if(!isset($req->removeFav) && !isset($req->checkFav)){
            return redirect('/order');
        }else if(isset($req->removeFav)){
            foreach($req->checkFav as $id){
                $fav = Favourite::find($id);
                $fav->delete();
            }
        }else{
            foreach($req->checkFav as $id){
                $fav = Favourite::find($id);
                $item = Auth::user()->Cart->where('order_code','=',null)->where('id_product','=',intval($fav->id_product))->first();
                if($item ){
                    if($fav->Product->quantity > $item->amount){
                        $item->amount +=1;
                        $item->save();
                    }
                }else{
                    $new_cart = new Cart();
                    $new_cart->order_code = null;
                    $new_cart->id_user= Auth::user()->id_user;
                    $new_cart->id_product = $fav->id_product;
                    $new_cart->amount=1;
                    $new_cart->created_at=Carbon::now()->format('Y-m-d H:i:s');
                    $new_cart->save();
                }
            }
            return redirect('/order');
        };
        return redirect()->back();
    }
    public function modalCart(){
        $list_cart = [];
        $sum =0;
        $html_list = "";
        if(Auth::check()){
            $list_cart = Cart::where('order_code','=',null)->where('id_user','=',Auth::user()->id_user)->get();
            if(count($list_cart)>0){
                foreach($list_cart as $key => $cart){
                    
                    $html_list.="<li class='list-group-item py-3 ps-0 border-top border-bottom'>
                        <div class='row align-items-center'>
                        <div class='col-3 col-md-2'>
                            <img src='resources/image/pet/".$cart->Product->Library[0]->image."' alt='".$cart->Product->Library[0]->product_name."' class='img-fluid' style='width: 200px'></div>
                        <div class='col-4 col-md-6 col-lg-5'>
                            <a href='".route('productdetail',[$cart->id_product])."' class='text-inherit'>
                            <h6 class='mb-0'>".$cart->Product->product_name."</h6>
                            </a>
                            <span><small class='text-muted'>".$cart->Product->Breed->TypeProduct->name_type."</small></span>
                            <div class='mt-2 small lh-1'> 
                                <a href='".route('removeId',$cart->id_cart)."' class='text-decoration-none text-inherit'> 
                                   <span class='text-muted'>Remove</span>
                                </a>
                            </div>
                        </div>
                        <div class='col-3 col-md-3 col-lg-3 '>
                        <form method='POST' action='".route('cartadd',$cart->id_cart)."' class='d-flex flex-column'>
                        <input type='hidden' name='_token' value=''>
                            <div class='input-group input-spinner '>
                                <a href='".route('minus',[$cart->id_cart])."' class='text-decoration-none btn'>
                                <i class='fa-solid fa-minus text-danger'></i>
                                </a>
                                <input type='text' value='$cart->amount' name='cart_quant'  class='form-control form-input' >
                                ";
                    if ($cart->amount < $cart->Product->quantity){
                        $html_list.="<a href='".route('addmore',[$cart->id_cart])."' class='text-decoration-none btn' >
                        <i class='fa-solid fa-plus text-danger'></i>
                        </a>";
        
                    }else{
                        $html_list.="<a class='disabled btn border-0'><i class='fa-solid fa-plus'></i></a>";
                    };
                    $html_list.="</div></form></div><div class='col-2 text-lg-end text-start text-md-end col-md-2'>";
                    ;
                    if($cart->Product->sale > 0 ){
                        $sum += $cart->Product->per_price *(1- ($cart->Product->sale /100)) * $cart->amount;
                        $html_list.= "<span class='fw-bold text-danger fs-5'>$". $cart->Product->per_price * (1-$cart->Product->sale/100) * $cart->amount."</span><span class='text-decoration-line-through ms-1'>".$cart->Product->per_price * $cart->amount."</span></div></div></li>";
                    }else{
                        $sum += $cart->Product->per_price * $cart->amount;
                        $html_list.= "<span class='fw-bold'>$".$cart->Product->per_price * $cart->amount."</span></div></div></li>"; 
                    }
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>$".$sum."</span></h4></div></li>";
            }else{
                $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
            };
        }else if(Session::has('cart')){
            $list_cart = Session::get('cart');
            if(count($list_cart)>0){
                foreach($list_cart as $key => $cart){
                    $sum += $cart["per_price"]*(1-$cart['sale']/100) * $cart["amount"];
                    $html_list.="<li class='list-group-item py-3 ps-0 border-top border-bottom'>
                        <div class='row align-items-center'>
                        <div class='col-3 col-md-2'>
                            <img src='resources/image/pet/".$cart["image"]."' alt='".$cart["name"]."' class='img-fluid' style='width: 200px'></div>
                        <div class='col-4 col-md-6 col-lg-5'>
                            <a href='".route('productdetail',[$cart["id_product"]])."' class='text-inherit'>
                            <h6 class='mb-0'>".$cart['name']."</h6>
                            </a>
                            <span><small class='text-muted'>".Product::find($cart["id_product"])->Breed->TypeProduct->name_type."</small></span>
                            <div class='mt-2 small lh-1'> 
                            <a href='".route('removeId',$key)."' class='text-decoration-none text-inherit'> 
                               <span class='text-muted'>Remove</span>
                            </a>
                            </div>
                        </div>
                        <div class='col-3 col-md-3 col-lg-3'>
                            <div class='input-group input-spinner '>
                                <a href='".route('minus',[$key])."' class='text-decoration-none btn'>
                                <i class='fa-solid fa-minus text-danger'></i>
                                </a>
                                <input type='text' value='".$cart["amount"]."' name='quantity' class='form-control form-input' readonly>
                                ";
                    if ($cart["amount"] < Product::find($cart["id_product"])->quantity){
                        $html_list.="<a href='".route('addmore',[$key])."' class='text-decoration-none btn' >
                        <i class='fa-solid fa-plus text-danger'></i>
                        </a>";
        
                    }else{
                        $html_list.="<a class='disabled btn border-0'><i class='fa-solid fa-plus'></i></a>";
                    };
                    $html_list.="</div></div><div class='col-2 text-lg-end text-start text-md-end col-md-2'>
                    <span class='fw-bold'>$".$cart["per_price"]*(1-$cart["sale"]/100) * $cart["amount"]."</span></div></div></li>";
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>$".$sum."</span></h4></div></li>";
            }else{
                $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
            };
        }
        echo $html_list;
    }
    public function cartadd_quan(Request $req, $id){
        $req->validate([
            'quan' =>"required|numeric|min:0"
        ],[
            'quan.required'=>"",
            'quan.numeric'=>"",
            'quan.min'=>""
        ]);
        if(Auth::check()){
            $cart = Cart::find($id);
            if(intval($req['quan']) == 0){
                $cart->delete();
            }else{
                $cart->amount = $req['quan'] > $cart->Product->quantity?$cart->Product->quantity:$req['quan'] ;
                $cart->save();
            }
        }else{
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($key == $id && intval($req['quan'])!=0){
                    $addQuan = intval($req['quan']) > intval($value['max']) ? intval($value['max']) : intval($req['quan']);
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$value['image'],'sale'=>$value['sale']]);
                } else if($key == $id && intval($req['quan'])==0){
                    continue;
                }else{
                    array_push($arr_new,$value);
                }
            }
            Session::put("cart",$arr_new);
        }
        return redirect()->back();
    }
    public function clearCart(){
        $html_list="";
        if(Auth::check()){
            $current_cart =  Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($current_cart as $cart){
                $cart->delete();
            }
        }else if(Session::has('cart')){
            Session::forget("cart");
        }
        $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
        echo $html_list;
    }
    public function addCompare($id){
        $msg="";
        $pet = Product::find($id);
        $rating  = 0;
        if(count($pet->Comment->where('rating','!=',null))>0){
            foreach($pet->Comment->where('rating','!=',null) as $rate){
                $rating += $rate->rating;
            }
            $rating /= count($pet->Comment->where('rating','!=',null));
        };
        $pet->rating = $rating;
        $pet->sold = count($pet->Comment->where('rating','!=',null));
        $pet->image = $pet->Library[0]->image;
        if(Session::has('compare')){
            if(count(Session::get('compare'))<=2){
                Session::push('compare',$pet);
            }
            $msg.="Add (".count(Session::get('compare'))."/3) Pet to compare";
        }else{
            $msg.="Add (1/3) Pet to compare";
            Session::put('compare',[$pet]);
        }
        echo $msg;
    }
    public function showCompare(){
        $cmp = "";
        $info = ["Image","Name","Type - Breed","Age","Weight","Gender","Status","Food","Sold","Quantity","Rating","Price",""];
        for($i =0; $i<count($info);$i++){
            $cmp.="<tr><td>".$info[$i]."</td>";
            foreach(Session::get('compare') as $key=> $pet){
                switch($i){
                    case 0: 
                        $cmp.="<td><img src='resources/image/pet/$pet->image' width='200' height='200' style='object-fit:cover'/></td>";
                        break;
                    case 1:
                        $cmp.="<td class='text-dark'>$pet->product_name</td>";
                        break;
                    case 2: 
                        $cmp.="<td class='text-dark'>".$pet->Breed->TypeProduct->name_type." - ".$pet->Breed->breed_name."</td>";
                        break;
                    case 3:
                        $cmp .= "<td class='text-dark'>".$pet->age." months</td>";
                        break;
                    case 4:
                        $cmp .= "<td class='text-dark'>".$pet->weight."kg</td>";
                        break;
                    case 5:
                        $cmp .="<td class='text-dark'>".($pet->gender==1?"Male":($pet->gender == 2? "Female":"Unknown"))."</td>";
                        break;
                    case 6:
                        $cmp .="<td class='text-dark'>".$pet->status."</td>";
                        break;
                    case 7:
                        $cmp .= "<td class='text-dark'>".$pet->food."</td>";
                        break;
                    case 8:
                        $cmp .= "<td class='text-dark'>".$pet->sold."</td>";
                        break;
                    case 9:
                        $cmp .= "<td class='text-dark'>".$pet->quantity."</td>";
                        break;
                    case 10:
                        $cmp.="<td>";
                        for($j =0; $j<$pet->rating;$j++){
                            $cmp.="<i class='bi bi-star-fill text-warning fs-5'></i>";
                        }
                        for($j = 0; $j < 5-$pet->rating;$j++){
                            $cmp.="<i class='bi bi-star text-warning fs-5'></i>";
                        };
                        $cmp.="</td>";
                        break;
                    case 11:
                        $cmp .= "<td><span class='fs-4 text-danger'>$".($pet->per_price * (1-$pet->sale/100))."</span>";
                        if($pet->sale>0){
                            $cmp.="<span class='text-muted ms-1'>(Off ".$pet->sale."%)</span>";
                        };
                        $cmp.="</td>";
                        break;
                    default:
                    $cmp .="<td><a href='".route('delCmp',$key)."' class='removeCmp btn' data-idcmp=".$key."><i class='bi bi-trash3 text-danger fs-3'></i></button></td>";
                    break;
                }
            };
            $cmp.="</tr>";
        }
        echo $cmp;
    }
    public function addCoupon($code){
        $coupon2 = Coupon::where('code','=',$code)->where('status','=',true)->first();
        if($coupon2){
            $checkAuth = count(Order::where('code_coupon','=',$code)->where('id_user','=',Auth::user()->id_user)->where('status','!=','cancel')->get()) >= $coupon2->max;
            if(!$coupon2 ||$checkAuth){
                $coupon2= ['error'=>!$coupon2?"Promo code is not Invalid":"You have reached the maximum use of this promo code"];
                $coupon2 = json_encode($coupon2);
                Session::forget('coupon');
            }else{
                Session::put('coupon',$coupon2->id_coupon);
            }
        }
        echo $coupon2;
    }
    public function delCompare($id){
        $arr_sess = Session::get('compare');
        unset($arr_sess[$id]);
        Session::put('compare',$arr_sess);
        return redirect()->back();
    }
    public function removeCompare(){
        Session::forget('compare');
        return redirect()->back();
    }
    public function mailToAdmin(Request $req){
        $content = $req["contact-mess"];
        $replyGmail =$req["contact-email"];
        Mail::to('didi01092k@gmail.com')->send(new ContactMail($content, $replyGmail));
        return redirect()->back()->with('message',"Send mail successfull");
    }
    public function get_feedback($order_code =null){
        if($order_code == null){
            $order=null;
        }else{
            $order = Order::where('order_code','=',$order_code)->first();
        }
        return view('frontend.feedback',compact('order'));
    }
    public function post_feedback(Request $req, $order_code =null){
        $order = Order::where('order_code','=',$order_code)->first();
        foreach($order->Cart as $cart){
            $new_comment = new Comment();
            $new_comment->id_product = $cart->id_product;
            $new_comment->id_user= Auth::user()->id_user;
            $new_comment->verified = true;
            $new_comment->context=$req['content_fb'.$cart->id_cart];
            $new_comment->rating= $req['rating_pro'.$cart->id_cart];
            $new_comment->created_at= Carbon::now()->format('Y-m-d H:i:s');
            $new_comment->save();
        }
        $news = $order->News->first();
        $news->delete();
        return redirect('/')->with('message','Send Feedback successfull');
    }
    public function get_listmessage(Request $req){
        if($req['codegroup'] && $req['codegroup'] != "new" ){
            $get_gr = Groupmessage::where('code_group','=',$req['codegroup'])->first();
            if(Auth::user()->admin == 1){
                $user = $get_gr->User1;
            }else{
                $user = $get_gr->User2;
            }
            $group = Message::where('code_group','=',$req['codegroup'])->get();
        }else{
            $user = User::find($req['id_user']);
            $group = Message::where('id_user','=',$req['id_user'])->where('code_group','=',null)->get();
        };
        $html="";
        foreach($group as $chat){
            $date_mess = Carbon::parse($chat->created_at);
            $date_cur = Carbon::now();
            $time= $date_cur->diffInDays($date_mess)>1 ? $date_cur->diffInDays($date_mess)." days ago": (($date_cur->diffInDays($date_mess) == 0)? ($date_cur->diffInHours($date_mess)> 0? $date_cur->diffInHours($date_mess).' hours before': $date_cur->diffInMinutes($date_mess). " minutes ago"): $date_cur->diffInDays($date_mess)." day ago");
            $html .= "<div class='row mb-4 mx-3'>";
            if($chat->id_user != Auth::user()->id_user){
                $html.= "<div class='col-1 me-3 rounded-circle border text-center p-1' style='width:40px;height: 40px'>";
                $html.= $chat->User->image?"<img src='resources/image/user/".$chat->User->image."' class='img-fluid h-100 rounded-circle' style='object-fit: cover'>":"<img src='resources/image/user/user.png' class='img-fluid h-100 rounded-circle' style='object-fit: cover'>";
                $html.="</div><div class='col-8'><span>".$chat->User->name."</span><div class='text-wrap rounded-1 border py-1 px-2 bg-light'>";
                $html.= $chat->message;
                $html.="</div><span class='text-black-50'>".$time."</span></div>";
            }else{
                $html.= "<div class='col-2'></div>";
                $html.="<div class='col-10 text-wrap rounded-1 border py-1 px-2 bg-light'>";
                $html.= $chat->message;
                $html.="</div>";
            }
            $html.= "</div>";
        };
        $data = [
            'mess' => $html,
            'name'=> $user->name
        ];
        echo implode(',',$data);
    }
    public function postajax_message(Request $req){
        $new_message = new Message();
        $code = $req['code_group'];
        if($code == "new"){
            $code = null;
        }else if($code == null){
            $code = "UCT".$req['connect_user'].Auth::user()->id_user;
            $group_exist = Groupmessage::where('code_group','=',$code)->first();
            if(!$group_exist){
                $new_gr = new Groupmessage();
                $new_gr->code_group = $code;
                $new_gr->id_user1 = $req['connect_user'];
                $new_gr->id_user2 = Auth::user()->id_user;
                $new_gr->save();
            }
            foreach(Message::where('code_group','=',null)->where('id_user','=',$req['connect_user'])->get() as $mess){
                $mess->code_group = $code;
                $mess->save();
            };
        };
        $new_message->code_group = $code;
        $new_message->id_user = Auth::user()->id_user;
        $new_message->message = $req['send_message'];
        $new_message->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_message->save();
        echo $req['send_message'];
    }
    public function get_test(){
        return view('frontend.testing');
    }
    public function add_like($id){
        $like = new Like();
        $like->id_comment = $id;
        $like->id_user = Auth::user()->id_user;
        $like->save();
        $num = count(Like::where('id_comment','=',$id)->get());
        echo $num;
    }   
    public function delete_like($id){
        $like= Like::where('id_user','=',Auth::user()->id_user)->where('id_comment','=',$id)->first();
        $like->delete();
        $num = count(Like::where('id_comment','=',$id)->get());
        echo $num;
    }
    public function ghn_getservice(Request $req){
        $district = $req['district'];
        $data = array(
            "shop_id" => 124157,
            "from_district" => 1444,
            "to_district"=>intval($district)
        );
        $payload = json_encode( $data );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: ea19c297-efa4-11ed-943b-f6b926345ef9", 
            ),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS     => $payload, 
        ));        
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
    public function gtn_servicefee (Request $req){
        $ward = $req['ward'];
        $service_id = intval($req['service_id']);
        $district = intval($req['district']);
        $total_weight = 0;
        if(Auth::check() && $total_weight == 0){
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($carts as $cart){
                $total_weight+=$cart->Product->weight * $cart->amount;
            }
        }else if($total_weight ==0){
            $carts = Session::get('cart');
            foreach($carts as $cart){
                $total_weight+= Product::find($cart['id_product'])->weight * $cart['amount'];
            }
        }
        
        $data = array(
            "from_district_id" => 1444,
            "service_id" => $service_id,
            "service_type_id"=> null,
            "to_district_id" => $district,
            "to_ward_code"=>$ward,
            "weight" => floor($total_weight),
        );
        $payload = json_encode( $data );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: ea19c297-efa4-11ed-943b-f6b926345ef9", 
                "ShopId: 124157",
            ),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS     => $payload, 
        ));        
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
    public function ghtk_servicefee(Request $req){
        $province = $req['province'];
        $district = $req['district'];
        $method = $req['method'];
        $total_weight = 0;
        $subtotal=0;
        if(Auth::check()){
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($carts as $cart){
                $total_weight+=$cart->amount;
                $subtotal += $cart->price*(1-$cart->sale/100)*($cart->amount/1000);
            }
        }else{
            $carts = Session::get('cart');
            foreach($carts as$cart){
                $total_weight+=$cart['amount'];
                $subtotal += $cart['per_price']*(1-$cart['sale']/100)*($cart['amount']/1000);
            }
        }
        //api GHTK
        $arr_deliver = array();
        $data = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "fly",
            "deliver_option" => "none",
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'fly' || !$method){
            array_push($arr_deliver,$response);
        }

        $data2 = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "road",
            "deliver_option" => "none",
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data2),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'road'||!$method){
            array_push($arr_deliver,$response);
        };

        $data3 = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "fly",
            "deliver_option" => "xteam",
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data3),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'xteam' || !$method){
            array_push($arr_deliver,$response);
        };
        echo json_encode($arr_deliver);
        // dd($data,$response);
    }
    public function modal_order($id){
        if(Auth::check() && Auth::user()->admin != "2"){
            echo "Wrong way bro";
        }else{
            $order = Order::find($id);
            $name =[];
            $images =[];
            $order->cart = $order->Cart->toArray();
            foreach($order->Cart as $cart){
                array_push($images,$cart->Product->Library[0]->image);
                array_push($name,$cart->Product->product_name);          
            };
            $order->image = $images;
            $order->product = $name;
            $order->discount = $order->code_coupon?$order->Coupon->discount: 0;
            $order->coupon_title = $order->code_coupon?$order->Coupon->title: '';
            echo $order;
        }
    }
    public function modal_notificate($id){
        if(Auth::check() && Auth::user()->admin == "0" ){
            echo "Wrong way bro";
        }else{
            $code = News::find($id)->link;
            $order = Order::where("order_code",'=',$code)->first();
            $name =[];
            $images =[];
            $order->cart = $order->Cart->toArray();
            foreach($order->Cart as $cart){
                array_push($images,$cart->Product->Library[0]->image);
                array_push($name,$cart->Product->name);          
            };
            $order->image = $images;
            $order->product = $name;
            $order->news = $id;
            $order->discount = $order->code_coupon?$order->Coupon->discount: 0;
            $order->coupon_title = $order->code_coupon?$order->Coupon->title: '';
            echo $order;
        }
    }
    public function post_confirmorder(Request $req){
        $order = Order::find($req['id_order']);
        $order->status = $req['status_order'];
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
        switch($req['status_order']){
            case "finished":
                if($order->id_user == null){
                    foreach($order->Cart as $cart){
                        $comment = new Comment();
                        $comment->id_product = $cart->id_product;
                        $comment->name = "Guest";
                        $comment->verified = true;
                        $comment->rating = 5;
                        $comment->phone = $order->phone;
                        $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $comment->save();
                    }
                }else{
                    $new = new News();
                    $new->order_code = $order->order_code;
                    $new->title = "How do you think about your order?";
                    $new->id_user = $order->id_user;
                    $new->link = "feedback";
                    $new->attr = $order->order_code;
                    $new->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $new->save();
                }
            break;
            case "transaction failed":
                foreach($order->Cart as $cart){
                    $product = $cart->Product;
                    $product->quantity += $cart->amount;
                    $product->save();
                    $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $cart->save();
                }
            break;
            case "delivery":
                Mail::to($order->email)->send(new OrderShipped($order));
            break;
            default:
        }
        return redirect()->back();
    }
    public function post_removenoti(Request $req){
        if(isset($req['id_notificate'])){
            $new = News::find($req['id_notificate']);
            $new->delete();
        }
        return redirect()->back();
    }
    public function list_allorder(){
        $orders = Order::orderBy('created_at','desc')->paginate(6);
        foreach($orders as $order){
            $sum = 0;
            foreach($order->Cart as $cart){
                $sum += $cart->price*(1 - $cart->sale/100)*$cart->amount;
            }
            if($order->Coupon){
                if($order->Coupon->discount >= 10){
                    $sum *= (1-$order->Coupon->discount /100);
                }else{
                    $sum-=$order->Coupon->discount;
                }
            }
            $sum += $order->shipping_fee;
            $order->total = $sum;
        }
        return view('user.pages.About.order',compact('orders'));
    }
    public function denied_order(Request $req){
        $order = Order::find($req['id_order']);
        $phone =$order->phone; 
        $order->phone = "G_".$phone;
        $order->save();
        $list_order = Order::where('id_user','=',null)->where('phone','=',Auth::user()->phone)->get();
        $num = count($list_order);
        echo $num;
    }
    public function accept_order(Request $req){
        $order = Order::find($req['id_order']);
        if($order->status == 'finished'){
            foreach($order->Cart as $cart){
                $cmt = Comment::where('id_product','=',$cart->id_product)->where('id_user','=',null)->where('phone','=',Auth::user()->phone)->first();
                $cmt->name=null;
                $cmt->id_user = Auth::user()->id_user;
                $cmt->phone = null;
                $cmt->save();
            }
        }
        $num=count(Auth::user()->Order);
        $cr_order_code = "USR".Auth::user()->id_user."_".$num;
        foreach($order->Cart as $cart){
            $cart->order_code = $cr_order_code;
            $cart->id_user = Auth::user()->id_user;
            $cart->save();
        }
        $order->order_code = $cr_order_code;
        $order->id_user = Auth::user()->id_user;
        $order->save();
        $list_order = Order::where('id_user','=',null)->where('phone','=',Auth::user()->phone)->get();
        $num = count($list_order);
        echo $num;
    }
}
