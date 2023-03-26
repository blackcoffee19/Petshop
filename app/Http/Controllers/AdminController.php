<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\Breed;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
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
            return redirect()->back()->with(["message"=>"Your email was not allow to attend Admin site"]);
        }
    }
    public function get_dashboard(){
        $state= "DB";
        $orders= Order::orderBy('created_at','desc')->limit(4)->get();
        $comments = Comment::orderBy('created_at','desc')->limit(5)->get();
        
        return view('backend.dashboard',compact('state','comments','orders'));
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
// TYPE PET
    public function get_listtype(){
        $state = "Type";
        return view('backend.TypePet.list_type',compact('state'));
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
        return view('backend.BreedPet.list_breed',compact('state'));
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
    public function get_listpet(Request $req){
        $state = "Pet";
        $sortType= $req->sortType;
        if($sortType != null){
            $list_breed = Breed::select('id_breed')->where('id_type_product','=',$sortType)->get();
            $pets = Product::whereIn('id_breed',$list_breed)->get(); 
        }else{
            $pets = Product::paginate(5);
        }
        return view('backend.Pets.list_pet',compact('pets','state','sortType'));
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
            "sold_pet"=>"numeric",
            "quantity_pet"=>"numeric",
            "price_pet"=>"numeric",
            "rating_pet"=>"regex:/([1-6]){1}/",
            "breed_pet"=>"required",
            "image_pet"=>"required"
        ],[
            "breed_pet.required"=>"Need choose type pet and breed for pet",
            "name_pet.regex"=>"Pet name invalid. It cannot contain numbers or speacial character and more than 2 characters",
            "age_pet.regex"=>"Pet age invalid",
            "sold_pet.numeric"=>"Input the number of pet has been sold",
            "quantity_pet.numeric"=>"Input the number of pet availiable",
            "price_pet.numeric"=>"Input price for pet",
            "rating_pet.regex"=>"Rating just 1-5",
            "image_pet.required"=>"Need add 1 picture of pet"
        ]);
        $new_pet = new Product();
        $new_pet->product_name = $req["name_pet"];
        $new_pet->id_breed = $req["breed_pet"];
        $new_pet->gender = $req["gender_pet"];
        $new_pet->age = $req["age_pet"];
        $new_pet->sold = $req["sold_pet"];
        $new_pet->quantity = $req["quantity_pet"];
        $new_pet->per_price=$req["price_pet"];
        $new_pet->food=$req["food_pet"];
        $new_pet->status=$req["status_pet"];
        $new_pet->rating=$req["rating_pet"];
        $new_pet->description=$req["describe"];
        $new_pet->created_at=Carbon::now()->format('Y-m-d H:i:s');
        if($req->hasFile('image_pet')){
            $file = $req->file('image_pet');
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
            $new_pet->image=$hinh;
        }
        $new_pet->save();
        return redirect('admin/pets/')->with(["message"=>"Add new pet successfully"]);
    }
    public function get_editpet($id){
        $state="Pet";
        $pet_edit = Product::where('id_product','=',$id)->first();
        $site = "Edit";
        return view('backend.Pets.edit_pet',compact('site','pet_edit','state'));
    }
    public function post_editpet(Request $req, $id){
        $req->validate([
            "name_pet"=>['regex:/^[a-zA-Z]+$/'],
            "age_pet"=>"regex:/([0-9])+/",
            "sold_pet"=>"numeric",
            "quantity_pet"=>"numeric",
            "price_pet"=>"numeric",
            "rating_pet"=>"regex:/([1-6]){1}/",
            "breed_pet"=>"required",
        ],[
            "breed_pet.required"=>"Need choose type pet and breed for pet",
            "name_pet.regex"=>"Pet name invalid. It cannot contain numbers or speacial character and more than 2 characters",
            "age_pet.regex"=>"Pet age invalid",
            "sold_pet.numeric"=>"Input the number of pet has been sold",
            "quantity_pet.numeric"=>"Input the number of pet availiable",
            "price_pet.numeric"=>"Input price for pet",
            "rating_pet.regex"=>"Rating just 1-5",
        ]);
        $edit_pet = Product::where('id_product','=',$id)->first();
        $edit_pet->product_name = $req["name_pet"];
        $edit_pet->id_breed = $req["breed_pet"];
        $edit_pet->gender = $req["gender_pet"];
        $edit_pet->age = $req["age_pet"];
        $edit_pet->sold = $req["sold_pet"];
        $edit_pet->quantity = $req["quantity_pet"];
        $edit_pet->per_price=$req["price_pet"];
        $edit_pet->food=$req["food_pet"];
        $edit_pet->status=$req["status_pet"];
        $edit_pet->rating=$req["rating_pet"];
        $edit_pet->description=$req["describe"];
        $edit_pet->updated_at=Carbon::now()->format('Y-m-d H:i:s');
        if($req->hasFile('image_pet')){
            $file = $req->file('image_pet');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                return redirect()->back()->with(['error'=>'File image must be jpg,png,jpeg,webp']);
            }
            $name=$file->getClientOriginalName();
            $num=0;
            $hinh = "pet_".$num."_".$name;
            while(file_exists('resources/image/pet/'.$hinh)){
                $num++;
                $hinh = "pet_".$num."_".$name;
            };
            $file->move('../resources/image/pet/',$hinh);
            $edit_pet->image=$name;
        }
        $edit_pet->save();
        return redirect('admin/pets/')->with(["message"=>"Edit pet successfully"]);
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
                $orders = Order::orderBy("created_at","desc")->paginate(6);
                break;
            case "status":
                $orders = Order::orderBy("status","desc")->paginate(6);
                break;
            case "user":
                $orders = Order::where("order_code",'LIKE','%user%')->paginate(6);
                break;
            case "guest":
                $orders = Order::where("order_code",'LIKE','%guest%')->paginate(6);
                break;
            case "cod":
                $orders = Order::where("method",'=','cod')->paginate(6);
                break;
            case "credit":
                $orders = Order::where("method",'=','credit')->paginate(6);
                break;
            case "all":
                $orders = Order::paginate(6);
                break;
            default:
                $orders = Order::paginate(6);
                break;
        }
        return view('backend.Orders.list_orders',compact('state','orders','sort'));      
    }
    public function get_editorder($id){
        $state = "Order";
        $order = Order::where('id_order','=',$id)->first();
        return view('backend.Orders.edit_order',compact('state','order'));
    }
//

    public function ajax_orderUser($id)
    {
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
}
