<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderShipped;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\Breed;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Slide;
use App\Models\User;
use App\Models\News;
use App\Models\Coupon;
use App\Models\Cart;
use App\Models\Banner;
use App\Models\Expense;
use App\Models\Library;
use App\Models\Address;
use App\Models\Favourite;
use App\Models\Groupmessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{
    public function get_login(){
        return view('backend.login');
    }
    public function post_login(Request $req){
        $req->validate([
            "username"=>"required|email",
            "pass"=>"required"
        ],[
            "username.required"=>"Please enter your admin gmail",
            "username.email"=>"Email is invalid. Check again",
            "pass.required"=>"Please enter your admin account password"
        ]);
        if(Auth::attempt(['email' => $req->username, 'password' => $req->pass])){
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with(["error"=>"Your email was not allow to attend Admin site"]);
        }
    }
    public function get_dashboard(Request $req){
        $state= "DB";
        $comments = Comment::orderBy('created_at','asc')->limit(5)->get();
        $recent_orders = Order::orderBy('created_at','desc')->limit(5)->get();
        foreach($recent_orders as $order){
            $total =0;
            foreach($order->Cart as $cart){
                $total += $cart->sale >0 ? $cart->price*(1-$cart->sale /100)*$cart->amount : $cart->price*$cart->amount;
            };
            $total = $order->code_coupon ? ($order->Coupon->discount >=10? $total*(1-$order->Coupon->discount/100): $total - $order->Coupon->discount): $total + 0;
            $total += $order->shipping_fee;
            $order->total = $total;
        }
        $year = isset($req['y'])? intval($req['y']): date('Y');
        $month  = isset($req['y']) &&  intval($req['y']) <date('Y') ? 12 :intval(date('m'));
        $income = array();
        $expense = array();
        for($i = 1; $i<=$month;$i++){
            $month_orders = Order::whereYear("created_at",$year)->whereMonth('created_at','=',$i)->where('status','=','finished')->get();
            $total =0;
            $costs_m =0;
            $month_expense = Expense::whereYear("created_at",$year)->whereMonth('created_at', '=', $i)->get();
            foreach($month_expense as $exp){
                $costs_m += $exp->costs;
            };
            array_push($expense,$costs_m);
            foreach($month_orders as $order){
                foreach($order->Cart as $cart){
                    $total += $cart->sale >0 ? $cart->price*(1-$cart->sale /100)*$cart->amount : $cart->price*$cart->amount;
                    
                };
                $total = $order->code_coupon ? ($order->Coupon->discount >=10? $total*(1-$order->Coupon->discount/100): $total - $order->Coupon->discount): $total + 0;
            }
            array_push($income,$total);
        }
        $order_y = count(Order::whereYear("created_at",$year)->get());
        $sale_pro = count(Product::where('sale','>',0)->get());

        $users = count(User::all());
        $customer = count(User::where('admin','!=','2')->get()) +count(Order::where('id_user','=',null)->get());
        $arr_order = [
            count(Order::where('status','=','finished')->get()),
            count(Order::where('status','=','cancel')->get()),
            count(Order::where('status','=','transaction failed')->get()),
            count(Order::where('status','=','unconfirmed')->orWhere('status','=','delivery')->get()),
        ];
        $order_currentYear = Order::select('order_code')->whereYear('updated_at',intval(date('Y')))->where('status','=','finished')->get()->toArray();
        $hot_product = Cart::select('id_product',DB::raw('COUNT(*) AS number'))->whereIn('order_code',$order_currentYear)->groupBy('cart.id_product')->orderBy('number','desc')->limit(5)->get();
        foreach($hot_product as $x){
            $product_x = Product::find($x->id_product);
            $x->name_product = $product_x->name;
            $x->image = "<img src='resources/image/pet/".$product_x->Library[0]->image."'/>";
            $x->route = route('productdetail', $x->id_product);
        };
        // dd($recent_orders,$income,$expense,$order_y,$sale_pro,$arr_order);
        return view('backend.Dashboard.dashboard',compact('state','recent_orders','income','expense','order_y','sale_pro','users','customer','year','arr_order','hot_product'));
    }
    public function get_profie(){
        $state = "";
        return view('backend.profie_admin',compact('state'));
    }
    public function ajax_breed($id_type){
        $breeds = Breed::where('id_type_product','=',$id_type)->get();
        foreach($breeds as $breed){
            echo "<option value='$breed->id_breed'>$breed->breed_name</option>";
        }
    }
    public function ajax_notificate($id){
        $new = News::find($id);
        $html = "<input type='hidden' name='id_order' value='".$new->Order->id_order."'><input type='hidden' name='id_news' value='".$id."'><tr><td>User</td><td>";
        $order = $new->Order;
        if(isset($order->User)){
            $html.=$order->User->name;
        }else{
            $html.="Guest";
        };
        $html.="</td></tr><tr><td>Reciver</td><td>".$order->cus_name."</td></tr><tr><td>Address</td><td>".$order->cus_address."</td></tr><tr><td>Phone</td><td>".$order->cus_phone."</td></tr><tr><td>Email</td><td>".$order->cus_email."</td></tr><tr><td>Coupon</td><td>".$order->code_coupon."</td></tr><tr><td>Cart</td><td><table class='table'><thead><tr><th>No</th><th>Name</th><th>Amount</th><th>Per_price</th><th>Sale</th></tr></thead><tbody id='check_order' data-status='".$order->status."'>";
        $sum = 0;
        foreach($order->Cart as $key=> $cart){
            $sum += $cart->Product->per_price*(1-$cart->Product->sale/100)*$cart->qty;
            $html.="<tr><td>$key</td><td>".$cart->Product->product_name."</td><td>".$cart->qty."</td><td>".$cart->Product->per_price."</td><td class='text-danger'>-".$cart->Product->sale."%</td></tr>";
        }
        $html.="</tbody><tfoot><tr><td colspan='3'>Shipping fee</td><td colspan='2'>$".$order->shipping_fee."</td></tr><tr><td colspan='3'>Total</td><td colspan='2' class='fw-bold text-danger'>$$sum</td></table></td></tr><tr><td>Method</td><td>".$order->method."</td></tr><tr><td>Image Bill</td><td>";
        if($order->image!=null){
            $html.="<img src='resources/image/payment/".$order->image."' width='200' class='img-fluid'></td>";
        }else{
            $html.="No image</td>";
        };
        if($order->status != 'cancel' && $order->status !='transaction failed' && $order->status != 'delivery'){  
            $html.="</tr><tr><td>Current Status</td><td>".$order->status."</td></tr><tr class='bg-success'><td class='text-light ps-3'>Change to</td><td class='p-1'><select class='form-select bg-light' name='new_status'><option value='confirmed'>Confirm</option><option value='delivery'>Delivery</option></select></td></tr>";
        }else{
            
            $html.="</tr><tr><td>Current Status</td><td>".$order->status."</td></tr>";
        }
        echo $html;
    }
    public function post_confirmOrder(Request $req){
        if(isset($req['id_order']) && isset($req['id_news']) ){
            $order = Order::find($req['id_order']);
            $order->status =$req['new_status'];
            $order->save();
            $news = News::find($req['id_news']);
            $news->delete();
            if($order->status == 'delivery'){
                Mail::to($order->cus_email)->send(new OrderShipped($order));
            }
            return redirect()->back()->with('message_confirm',"Confirm Order Successfully");
        }else{
            return redirect()->back()->with('message_error','Error');
        };
    }
    public function ajax_removeNews($id){
        $news = News::find($id);
        $news->delete();
        return redirect()->back()->with('message_error',"Remove 1 news");
    }
// TYPE PET
    public function get_listtype(){
        $state = "Type";
        $types = TypeProduct::all(); 
        return view('backend.TypePet.list_type',compact('state','types'));
    }
    public function get_addtype(){
        $site = "Add";
        $state = "Type";
        return view('backend.TypePet.edit_type',compact("site",'state'));
    }
    public function post_addtype(Request $req){
        $req->validate([
            "name_type" =>"required|min:2"
        ],[
            "name_type.required"=>"Name type of pet cannot be blank",
            "name_type.min"=>"Name type of pet invalid"
        ]);
        $name = strtolower($req['name_type']);
        $check = TypeProduct::where('name_type','=',$name)->get();
        if(count($check)==0){
            $new_type = new TypeProduct();
            $new_type->name_type = $name;
            $new_type->created_at= Carbon::now()->format('Y-m-d H:i:s');
            $new_type->save();
            return redirect('admin/typepet/')->with(["message"=>"Add new Type pet successfully"]);
        }
        return redirect()->back()->with(["error"=>"There are exist ".$req["name_type"].". Choose another"]);
    }
    public function get_edittype($id){
        $site = "Edit";
        $state = "Type";
        $type_pet = TypeProduct::where('id_type','=',$id)->first();
        return view('backend.TypePet.edit_type',compact('site','type_pet','state'));
    }
    public function post_edittype(Request $req,$id){
        $req->validate([
            "name_type" =>"required|min:2"
        ],[
            "name_type.required"=>"Name type of pet cannot be blank",
            "name_type.min"=>"Name type of pet invalid"
        ]);
        $type = TypeProduct::where('id_type','=',$id)->first();
        $type->name_type=$req["name_type"];
        $type->save();
        return redirect('admin/typepet/')->with(['message'=>"Change name of type successfully"]);
    }
    public function deleteType($id){
        $id_breeds = Breed::where('id_type_product',$id)->get('id_breed');
        $pets = Product::whereIn('id_breed',$id_breeds)->get();
        if(count($pets)>0){
            return redirect()->back()->with(["error"=>"Cannot delete Type pet because there has at least 1 pet in this type"]);
        }else{
            $type_pet = TypeProduct::where('id_type','=',$id)->first();
            $type_pet->delete();
            return redirect()->back()->with(["message"=>"Delete type pet successfull"]);
        }
    }
//
// BREED
    public function get_listbreed(){
        $state = 'Breed';
        $breeds = Breed::all();
        return view('backend.BreedPet.list_breed',compact('state','breeds'));
    }
    public function get_addbreed(){
        $site = "Add";
        $state = 'Breed';
        return view('backend.BreedPet.edit_breed',compact('site','state'));
    }
    public function post_addbreed(Request $req){
        $req->validate([
            "type"=>"required",
            "name_breed"=>"required|min:2"
        ],[
            "type.required"=>"You must choose 1 type for breed",
            "name_breed.required" =>"Name of breed cannot be blank",
            "name_breed.min" => "Name of breed need more than 2 character"
        ]);
        $name = strtolower($req["name_breed"]);
        $check = Breed::where('breed_name','=',$name)->get();
        if(count($check)==0){
            $new_breed = new Breed();
            $new_breed->breed_name = $name;
            $new_breed->id_type_product = intval($req["type"]);
            $new_breed->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $new_breed->save();
            return redirect('admin/breed/')->with(["message"=>"Add new breed successfully"]);
        }else{
            return redirect()->back()->with(["error"=>"Breed Name ".$name." exist! Choose another"]);
        };
    }
    public function get_editbreed($id){
        $site = "Edit";
        $state = "Breed";
        $breed_edit = Breed::where('id_breed','=',$id)->first();
        return view('backend.BreedPet.edit_breed',compact('site','breed_edit','state'));
    }
    public function post_editbreed(Request $req,$id){
        $req->validate([
            "type"=>"required",
            "name_breed"=>"required|min:2"
        ],[
            "type.required"=>"You must choose 1 type for breed",
            "name_breed.required" =>"Name of breed cannot be blank",
            "name_breed.min" => "Name of breed need more than 2 character"
        ]);
        $name = strtolower($req["name_breed"]);
        $breed = Breed::where('id_breed','=',$id)->first();
        $breed->id_type_product = $req["type"];
        $breed->breed_name = $name;
        $breed->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $breed->save();
        return redirect('admin/breed/')->with(["message"=>"Edit breed Successfully"]);
    }
    public function deleteBreed($id){
        $check = Product::where('id_breed','=',$id)->get();
        if(count($check)>0){
            return redirect()->back()
            ->with(["error"=>"Cannot remove that breed because there has product in that breed"]);
        }else{
            $breed = Breed::where('id_breed','=',$id)->first();
            $breed->delete();
            return redirect()->back()->with(["message"=>"Delete Breed successfully"]);
        }
    }
//
// PETS
    public function get_listpet($id =null){
        $state = "Pet";
        $sortType= $id;
        if($sortType != null && $sortType !=0){
            $list_breed = Breed::select('id_breed')->where('id_type_product','=',$sortType)->get();
            $pets = Product::whereIn('id_breed',$list_breed)->paginate(10); 
        }else{
            $pets = Product::orderBy('created_at','desc')->paginate(10);
        }
        return view('backend.Pets.list_pet',compact('pets','state','sortType'));
    }
    public function search_pet(Request $req){
        $state = "Pet";
        $search = $req['q']? $req['q']:'';
        $sortType = null;
        $no_pagi = true;
        if(isset($req['q'])){
            $pets = Product::where('product_name','LIKE','%'.$req['q'].'%')->get();
        }else{
            $pets = Product::paginate(10);
        };
        return view('backend.Pets.list_pet',compact('pets','state','search','sortType','no_pagi'));

    }
    public function sort_pet(Request $req){
        $sort = $req['sortS'];
        $state = "Pet";
        $pets = [];
        $no_pagi = true;
        switch($sort){
            case "dateL":
                $pets = Product::orderBy('created_at','desc')->get();
                break;
            case "dateO":
                $pets = Product::orderBy('created_at','asc')->get();
                break;
            case "descP":
                $pets = Product::orderBy('per_price','desc')->get();
                break;
            case "ascP":
                $pets = Product::orderBy('per_price','asc')->get();
                break;
            case "descR":
                $pets = Product::orderBy('created_at','desc')->get()->sort(function ($a, $b) {
                    $rating1 = 0;
                    if (count($a->Comment->where('rating','!=',null)) >0) {
                        foreach ($a->Comment->where('rating','!=',null) as $cmt1) {
                            $rating1 += $cmt1->rating;
                        }
                        $rating1 /= count($a->Comment->where('rating','!=',null));
                    }
                    $rating2 = 0;
                    if (count($b->Comment->where('rating','!=',null)) >0) {
                    foreach ($b->Comment->where('rating','!=',null) as $cmt2) {
                        $rating2 += $cmt2->rating;
                    }
                    $rating2 /= count($b->Comment->where('rating','!=',null));
                    }
                    if ($rating1 == $rating2) {
                        return 0;
                    }
                    return ($rating1 > $rating2) ? -1 : 1;
                });
                break;
            case "ascR":
                $pets = Product::orderBy('created_at','desc')->get()->sort(function ($a, $b) {
                    $rating1 = 0;
                    if (count($a->Comment->where('rating','!=',null)) >0) {
                        foreach ($a->Comment->where('rating','!=',null) as $cmt1) {
                            $rating1 += $cmt1->rating;
                        }
                        $rating1 /= count($a->Comment->where('rating','!=',null));
                    }
                    $rating2 = 0;
                    if (count($b->Comment->where('rating','!=',null)) >0) {
                    foreach ($b->Comment->where('rating','!=',null) as $cmt2) {
                        $rating2 += $cmt2->rating;
                    }
                    $rating2 /= count($b->Comment->where('rating','!=',null));
                    }
                    if ($rating1 == $rating2) {
                        return 0;
                    }
                    return ($rating1 < $rating2) ? -1 : 1;
                });
                break;
            default:
                $pets = Product::orderBy('created_at','desc')->get();
                break;
        }
        return view('backend.Pets.list_pet',compact('pets','state','sort','no_pagi'));
    }
    public function get_addpet(){
        $site="Add";
        $state = "Pet";
        return view('backend.Pets.edit_pet',compact('site','state'));
    }
    public function post_addpet(Request $req){
        $req->validate([
            "name_pet"=>['regex:/^[a-zA-Z]+$/'],
            "age_pet"=>"regex:/([0-9])+/",
            "quantity_pet"=>"numeric",
            "price_pet"=>"numeric",
            "original_price"=>"numeric",
            "breed_pet"=>"required",
            "photos"=>"required"
        ],[
            "breed_pet.required"=>"Need choose type pet and breed for pet",
            "name_pet.regex"=>"Pet name invalid. It cannot contain numbers or speacial character and more than 2 characters",
            "age_pet.regex"=>"Pet age invalid",
            "original_price.numeric"=>"Input orginal price of pet",
            "quantity_pet.numeric"=>"Input the number of pet availiable",
            "price_pet.numeric"=>"Input price for pet",
            "photos.required"=>"Need add 1 picture of pet"
        ]);
        $new_pet = new Product();
        $new_pet->product_name = $req["name_pet"];
        $new_pet->id_breed = $req["breed_pet"];
        $new_pet->gender = $req["gender_pet"];
        $new_pet->age = $req["age_pet"];
        $new_pet->quantity = $req["quantity_pet"];
        $new_pet->per_price=$req["price_pet"];
        $new_pet->food=$req["food_pet"];
        $new_pet->status=$req["status_pet"];
        $new_pet->description=$req["describe"];
        $new_pet->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $new_pet->save();
        $new_expent = new Expense();
        $new_expent->id_product = $new_pet->id_product;
        $new_expent->costs = $req['original_price'];
        $new_expent->quantity =  $req['original_price'];
        $new_expent->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_expent->save();
        $news_pro = new News();
        $news_pro->title = "New Product";
        $news_pro->link = "products-details";
        $news_pro->attr = $new_pet->id_product;
        $news_pro->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $news_pro->save();
        if($req->hasFile('photos')){
            $files = $req->file('photos');
            $imageNames = [];
            foreach ($files as $file) {
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                    return redirect()->back()->with(['error'=>'File image must be jpg,png,jpeg,webp']);
                }
                $name=$file->getClientOriginalName();
                $num=0;
                $hinh = "hinhmoi_".$num."_".$name;
                while(file_exists('resources/image/pet/'.$hinh)){
                    $num++;
                    $hinh = "hinhmoi_".$num."_".$name;
                };
                $file->move('resources/image/pet/',$hinh);
                $imageNames[] = $hinh;
            }
            foreach ($imageNames as $imageName) {
                $library = new Library();
                $library->image = $imageName;
                $library->id_product = $new_pet->id_product;
                $library->save();
            }
        }
        return redirect('admin/pets/list')->with(["message"=>"Add new pet successfully"]);
    }
    public function get_editpet($id){
        $state="Pet";
        $pet_edit = Product::where('id_product','=',$id)->first();
        $pet_edit->original_price = $pet_edit->Expense->last()->costs;
        $site = "Edit";
        return view('backend.Pets.edit_pet',compact('site','pet_edit','state'));
    }
    public function post_editpet(Request $req, $id){
        $req->validate([
            "name_pet"=>['regex:/^[a-zA-Z]+$/'],
            "age_pet"=>"regex:/([0-9])+/",
            "quantity_pet"=>"numeric",
            "price_pet"=>"numeric",
            "original_price"=>"numeric",
            "breed_pet"=>"required"
        ],[
            "breed_pet.required"=>"Need choose type pet and breed for pet",
            "name_pet.regex"=>"Pet name invalid. It cannot contain numbers or speacial character and more than 2 characters",
            "age_pet.regex"=>"Pet age invalid",
            "original_price.numeric"=>"Input orginal price of pet",
            "quantity_pet.numeric"=>"Input the number of pet availiable",
            "price_pet.numeric"=>"Input price for pet"
        ]);
        $edit_pet = Product::where('id_product','=',$id)->first();
        if($edit_pet->quantity<$req["quantity_pet"]){
            $new_expent = new Expense();
            $new_expent->id_product =$edit_pet->id_product;
            $new_expent->costs = $req['original_price'];
            $new_expent->quantity =  $req["quantity_pet"]-$edit_pet->quantity;
            $new_expent->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $new_expent->save();
        }
        $edit_pet->product_name = $req["name_pet"];
        $edit_pet->id_breed = $req["breed_pet"];
        $edit_pet->gender = $req["gender_pet"];
        $edit_pet->age = $req["age_pet"];
        $edit_pet->quantity = $req["quantity_pet"];
        $edit_pet->per_price=$req["price_pet"];
        $edit_pet->food=$req["food_pet"];
        $edit_pet->status=$req["status_pet"];
        $edit_pet->description=$req["describe"];
        $edit_pet->updated_at=Carbon::now()->format('Y-m-d H:i:s');
        $edit_pet->save();
        if($req->hasFile('photos')){
            $files = $req->file('photos');
            foreach ($files as $key=> $image ) {
                $duoi = $image->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                    return redirect()->back()->with(['error'=>'File image must be jpg,png,jpeg,webp']);
                }
                $name=$image->getClientOriginalName();
                $num=0;
                $hinh = "hinhmoi_".$num."_".$name;
                while(file_exists('resources/image/pet/'.$hinh)){
                    $num++;
                    $hinh = "hinhmoi_".$num."_".$name;
                };
                $image->move('resources/image/pet/',$hinh);
                if(count($edit_pet->Library) > $key ){
                    for($i =0; $i<count($edit_pet->Library);$i++){
                        if($i == $key){
                            $edit_pet->Library[$i]->image = $hinh;
                            $edit_pet->Library[$i]->save();
                        }
                    }
                }else{
                    $img = new Library();
                    $img->id_product = $edit_pet->id_product;
                    $img->image = $hinh;
                    $img->save();
                }
            }
        }
        return redirect('admin/pets/list')->with(["message"=>"Edit pet successfully"]);
    }
    public function deletePet($id){
        $deletePet = Product::where('id_product','=',$id)->first();
        $deletePet->delete();
        return redirect()->back()->with(["message"=>"Delete pet successfully"]);
    }
//
//USERS
    public function get_listuser(Request $req){
        $state = "User";
        $sortType = $req->sortType;
        if($sortType == null || $sortType == "all"){
            $users = User::paginate(10);
        }else{
            $admin_id = $sortType == "admin"?1:0;
            $users = User::where('admin','=',$admin_id)->get();
        }
        return view('backend.Users.list_user',compact('state','users','sortType'));
    }
    public function get_adduser(){
        $site = "Add";
        $state = "User";
        return view('backend.Users.edit_user',compact('state','site'));
    }
    public function post_adduser(Request $req){
        $req->validate([
            "pass2"=>"same:pass1"
        ],[
            "pass2.same"=>"Re-enter password not match"
        ]);
        $new_user = new User();
        $new_user->name = $req["user_name"];
        if(count(User::where('email','=',$req["email"])->get())>0){
            return redirect()->back()->with(["error"=>"This email has signed up. Choose another email"]);
        }
        $new_user->email = $req["email"];
        $new_user->gender = $req["gender"];
        $new_user->phone_number= $req["phone"];
        $new_user->dob= $req["user_birth"];
        $new_user->admin = $req["admin"];
        $new_user->password = bcrypt($req["pass2"]);
        if($req["checkImg"]=="on" && $req->hasFile('img_user')){
            $file = $req->file('img_user');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" &&$type != "png"&&$type != "jpeg" &&$type != "webp" ){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            };
            $img_name = $file->getClientOriginalName();
            $num=0;
            $img_userImg = "user_".$num."_".$img_name;
            while(file_exists('resources/image/user/'.$img_userImg)){
                $num++;
                $img_userImg = "user_".$num."_".$img_name;
            }
            $file->move('resources/image/user/',$img_userImg);
            $new_user->image= $img_userImg;
        }else if($req["checkImg"]=="on"){
            return redirect()->back()->with(["error"=>"You still not upload image for user. If you don't want add umage for user uncheck add image"]);
        }else{
            $new_user->image = null;
        }
        $new_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_user->save();
        return redirect('admin/users/')->with(["message"=>"Add new user successfully"]);
    }   
    public function get_edituser($id){
        $site = "Edit";
        $state = "User";
        $user = User::where('id_user','=',$id)->first();
        return view('backend.Users.edit_user',compact('state','site','user'));
    }
    public function post_edituser (Request $req, $id){
        $user_edit = User::where('id_user','=',$id)->first();
        $user_edit->name=$req["user_name"];
        if(count(User::where('email','=',$req["email"])->where('id_user','!=',$id)->get())>0){
            return redirect()->back()->with(["error"=>"This email has signed up. Choose another email"]);
        }
        $user_edit->email = $req["email"];
        $user_edit->gender = $req["gender"];
        $user_edit->phone_number= $req["phone"];
        $user_edit->dob= $req["user_birth"];
        $user_edit->admin = $req["admin"];
        if(isset($req["changeUserPass"])){
            $req->validate([
                "pass1"=>"required",
                "pass2"=>"required|same:pass1"
            ],[
                "pass1.required"=>"Enter new password for user. If you don't want change user's password, then un-check",
                "pass2.required"=>"Enter re password for user",
                "pass2.same"=>"Re-enter password not match"
            ]);
            $user_edit->password = bcrypt($req["pass2"]);
        }
        if($req["checkImg"]=="on" && $req->hasFile('img_user')){
            $file = $req->file('img_user');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" &&$type != "png"&&$type != "jpeg" &&$type != "webp" ){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            };
            $img_name = $file->getClientOriginalName();
            $num = 0;
            $img_userImg = "user_".$num."_".$img_name;
            while(file_exists('resources/image/user/'.$img_userImg)){
                $num++;
                $img_userImg = "user_".$num."_".$img_name;
            }
            $file->move('resources/image/user/',$img_userImg);
            $user_edit->image= $img_userImg;
        }else if($req["checkImg"]=="on"){
            return redirect()->back()->with(["error"=>"You still not upload image for user. If you don't want add umage for user uncheck add image"]);
        }
        $user_edit->updated_at=Carbon::now()->format('Y-m-d H:i:s');
        $user_edit->save();
        return redirect('admin/users/')->with(["message"=>"Edit user: $user_edit->name successfully"]);
    }
    public function deleteUser($id){
        if($id == Auth::user()->id_user){
            return redirect('admin/users/')->with(["error"=>"Cannot delete your account now"]);
        }else if(User::where('id_user','=',$id)->where('admin','=',1)->first()){
            return redirect('admin/users/')->with(["error"=>"Cannot delete admin account. You can set this admin to be guest before delete them"]);
        }
        $user = User::where('id_user','=',$id)->first();
        $user->delete();
        return redirect('admin/users/')->with(["message"=>"Delete user successfully"]);
        
    }
//
// ORDERS
    public function get_listorder( $sort = null){
        $state = "Order";
        switch($sort){
            case "created_at":
                $orders = Order::orderBy("created_at","desc")->paginate(10);
                break;
            case "finished":
                $orders = Order::where('status','=','finished')->paginate(10);
                break;
            case "confirmed":
                $orders = Order::where('status','=','confirmed')->paginate(10);
                break;
            case "delivery":
                $orders = Order::where('status','=','delivery')->paginate(10);
                break;
            case "unconfimred":
                $orders = Order::where('status','=','unconfimred')->paginate(10);
                break;
            case "cancel":
                $orders = Order::where('status','=','cancel')->paginate(10);
                break;
            case "transaction failed":
                $orders = Order::where('status','=','transaction failed')->paginate(10);
                break;
            case "user":
                $orders = Order::where("order_code",'LIKE','%user%')->paginate(10);
                break;
            case "guest":
                $orders = Order::where("order_code",'LIKE','%guest%')->paginate(10);
                break;
            case "cod":
                $orders = Order::where("method",'=','cod')->paginate(10);
                break;
            case "credit":
                $orders = Order::where("method",'=','credit')->paginate(10);
                break;
            case "all":
                $orders = Order::paginate(10);
                break;
            default:
                $orders = Order::orderBy('created_at','desc')->paginate(10);
                break;
        }
        foreach($orders as $order){
            $amount = 0;
            foreach($order->Cart as $cart){
                $amount += $cart->price*(1-$cart->sale/100)*$cart->amount;
            }
            $amount = $order->code_coupon ?  ($order->Coupon->discount >=10? $amount *(1-$order->Coupon->discount/100):$amount-$order->Coupon->discount) : $amount;
            $amount += $order->shipping_fee;
            $order->total = $amount;
        }
        return view('backend.Orders.list_orders',compact('state','orders','sort'));      
    }
    public function get_orderdetail($id){
        $state = "Order";
        $order = Order::where('id_order','=',$id)->first();
        return view('backend.Orders.order_detail',compact('state','order'));
    }
//
//SLIDE
    public function get_listslide(){
        $state = "Slide";
        $slides =Slide::paginate(5);
        return view('backend.Sliders.list_slide',compact('slides','state'));
    }
    
    public function list_option_breed($type){
        $list= "<option value='all'>All Breed</option>";
        $id_type = TypeProduct::select('id_type')->where('name_type','=',$type)->first();
        foreach(Breed::whereIn('id_type_product',$id_type)->get() as $breed){
            $list.="<option value='".$breed->breed_name."'>".$breed->breed_name."</option>";
        }
        echo $list;
    }
    public function list_petsl($id =null){
        $list = "";
        $pets = Product::all();
        foreach($pets as $pet){
            $list.="<option value='".$pet->id_product."'";
            if($id !=null){
                if(intval($id) == $pet->id_product){
                    $list .=" selected";
                };
            }; 
            $list.= ">".$pet->product_name."</option>";
        }
        echo $list;
    }
    public function post_addslide(Request $req){
        $new_slide = new Slide();
        $new_slide->title = $req["add_title"];
        $new_slide->title_color = $req["add_title-color"];
        $new_slide->content = $req['add_content']; 
        $new_slide->content_color = $req["add_content_color"];
        $new_slide->btn_content = $req["add_button"];
        $new_slide->btn_color = $req["add_btn_color"];
        $new_slide->btn_bg_color = $req["add_btn_bg_color"];
        $new_slide->alert = $req["add_alert"];
        $new_slide->alert_size= $req["add_alert_size"];
        $new_slide->alert_color =  $req["add_alert_color"];
        $new_slide->alert_bg = $req["add_alert_bg_color"];
        $new_slide->link = $req["add_link"];
        if($req["add_link"] == "productlist"){
            $new_slide->attr1= $req["add_attr1"];
            $new_slide->attr2 = $req["add_attr2"];
        }else if($req["add_link"] == 'productdetail'){
            $new_slide->attr1 = $req["add_idpet"];
        };
        if($req->hasFile('imageSlide')){
            $file = $req->file('imageSlide');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" &&$type != "png"&&$type != "jpeg" &&$type != "webp" ){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            };
            $img_name = $file->getClientOriginalName();
            $num = 0;
            $img_slide = "user_".$num."_".$img_name;
            while(file_exists('resources/image/slides/'.$img_slide)){
                $num++;
                $img_slide = "user_".$num."_".$img_name;
            }
            $file->move('resources/image/slides/',$img_slide);
            $new_slide->created_at= Carbon::now()->format('Y-m-d H:i:s');
            $new_slide->updated_at= Carbon::now()->format('Y-m-d H:i:s');
            $new_slide->image= $img_slide;
        }else{
            return redirect()->back()->with('error','Add new slide fail!. Select 1 image for Slide');
        };
        $new_slide->save();
        return redirect()->back()->with('message','Add new slide successfull');
    }
    public function get_editslide($id){
        $slide = Slide::find($id);
        echo $slide;
    }
    public function post_editslide(Request $req){
        if(!isset($req['edit_id_slide'])){
            return redirect()->back()->with('error','Error: Edit slide fail');
        };
        $edit_slide = Slide::find($req['edit_id_slide']);
        $edit_slide->title = $req["title"];
        $edit_slide->title_color = $req["title-color"];
        $edit_slide->content = $req['content']; 
        $edit_slide->content_color = $req["content-color"];
        $edit_slide->btn_content = $req["button"];
        $edit_slide->btn_color = $req["btn-color"];
        $edit_slide->btn_bg_color = $req["btn-bg-color"];
        $edit_slide->alert = $req["alert"];
        $edit_slide->alert_size= $req["alert-size"];
        $edit_slide->alert_color =  $req["alert-color"];
        $edit_slide->alert_bg = $req["alert-bg-color"];
        $edit_slide->link = $req["link"];
        if($req["link"] == "productlist"){
            $edit_slide->attr1= $req["attr1"];
            $edit_slide->attr2 = $req["attr2"];
        }else if($req["add_link"] == 'productdetail'){
            $edit_slide->attr1 = $req["edit_idpet"];
        };
        if(isset($req["changeImgSlide"]) && $req->hasFile('imageSlide')){
            $file = $req->file('imageSlide');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" &&$type != "png"&&$type != "jpeg" &&$type != "webp" ){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            };
            $img_name = $file->getClientOriginalName();
            $num = 0;
            $img_slide = "user_".$num."_".$img_name;
            while(file_exists('resources/image/slides/'.$img_slide)){
                $num++;
                $img_slide = "user_".$num."_".$img_name;
            }
            $file->move('resources/image/slides/',$img_slide);
            $edit_slide->image= $img_slide;
        }else if(isset($req["changeImgSlide"])){
            return redirect()->back()->with('error','Add new slide fail!. Select 1 image for Slide');
        };
        $edit_slide->updated_at =Carbon::now()->format('Y-m-d H:i:s');
        $edit_slide->save();
        return redirect()->back()->with('message','Add new slide successfull');
    }
    public function deleteSlide($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('message','Delete Slide successfull');
    }
//
//BANNER
    public function get_listbanner(){
        $state = "Banner";
        $banners = Banner::all();
        return view('backend.Banner.list_banners',compact('state','banners'));
    }
    public function model_editbanner($id){
        $banner = Banner::find($id);
        echo $banner;
    }
    public function post_editbanner(Request $req){
        // dd($req);
        $edit_banner = Banner::find($req["id_banner"]);
        $edit_banner->title=$req["title"];
        $edit_banner->title_color=$req['title_color'];
        $edit_banner->content = $req['content'];
        $edit_banner->content_color = $req["content_color"];
        $edit_banner->btn_content = $req['btn_content'];
        $edit_banner->btn_bg_color = $req['btn_bg_color'];
        $edit_banner->btn_color = $req['btn_color'];
        $edit_banner->link = $req['link'];
        if($req['link'] == 'productlist'){
            $edit_banner->attr = $req['attr'];
        }else{
            $edit_banner->attr = null;
        };
        if($req->hasFile('new_img')){
           $file = $req->file('new_img');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                return redirect()->back()->with(['error'=>'File image must be jpg,png,jpeg,webp']);
            }
            $name=$file->getClientOriginalName();
            $num=0;
            $hinh = "banner_".$num."_".$name;
            while(file_exists('resources/image/banner/'.$hinh)){
                $num++;
                $hinh = "hinhmoi_".$num."_".$name;
            };
            $file->move('resources/image/banner/',$hinh);
            $edit_banner->image=$hinh;
        }
        $edit_banner->save();
        return redirect()->back()->with('message','Edit Banner Successfully');
    }
//
//COUPONS
    public function get_listcoupon(){
        $state = "Coupon";
        $coupons = Coupon::orderBy('status','desc')->paginate(10);
        return view('backend.Coupon.list_coupon',compact('state','coupons'));
    }
    public function ajax_getcoupon($id){
        $coupon = Coupon::find($id);
        echo $coupon;
    }
    public function post_addcoupon(Request $req){
        $new_coupon  = new Coupon();
        $new_coupon->title = $req['add_coupon_title'];
        $new_coupon->code = $req['add_coupon_code'];
        $new_coupon->discount = $req['add_coupon_disc'];
        $new_coupon->status = boolval($req['add_coupon_status']);
        $new_coupon->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_coupon->save();
        return redirect()->back()->with('message','Add new Coupon successfully');
    }
    public function post_editcoupon(Request $req){
        if(!isset($req['edit_id_coupon'])){
            return redirect()->back()->with('error','Add Coupon faild!');
        };
        $edit_coupon = Coupon::find($req['edit_id_coupon']);
        $edit_coupon->title = $req['coupon_title'];
        $edit_coupon->code = $req['coupon_code'];
        $edit_coupon->discount = $req['coupon_disc'];
        $edit_coupon->status =  boolval($req['coupon_status']);
        $edit_coupon->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $edit_coupon->save();
        return redirect()->back()->with('message','Edit Coupon successfully');
    }
//
//AJAX
    public function ajax_orderUser($id){
        $str ="";
        $user_orders = Order::where('id_user','=',$id)->orderBy('created_at','desc')->get();
        if(count($user_orders) == 0){
            $str.="<tr><td colspan='7' class='text-center text-muted fs-3'>User didn't order any thing</td></tr>";
        }
        for($i =0;$i<count($user_orders); $i++){
            $num = $i+1;
            $sum=0;
            $str.="<tr><td>$num</td><td>".date('d/m/Y H:i:s',strtotime($user_orders[$i]->created_at)) ."</td><td><table class='table'><thead><tr><th>Name</th><th>Type</th><th>Qty</th><th>Price</th></tr></thead><tbody>";
            foreach($user_orders[$i]->Cart as $cart){
                $sum += $cart->qty * $cart->Product->per_price;
                $str.="<tr><td>".$cart->Product->product_name."</td><td>".$cart->Product->Breed->TypeProduct->name_type."</td><td>".$cart->qty."</td><td> $".$cart->Product->per_price."</td></tr>";
            }
            $str.="</tbody><tfoot><tr><td colspan='2'>Total</td><td colspan='2' class='text-danger'>$$sum</td></tr></tfoot></table></td><td>".$user_orders[$i]->cus_name."</td><td>".$user_orders[$i]->cus_address."</td><td>".$user_orders[$i]->method."</td><td>".$user_orders[$i]->status."</td></tr>";
        }

        echo $str;
    }
//
}
