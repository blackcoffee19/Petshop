<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class ControllerAdmin extends Controller
{
    public function homePage(){
        // $slides = Slide::orderBy('updated_at','desc')->limit(5)->get();
	    $banners = Banner::all();
        dd($banners);
        // $popular_pets= Product::where('quantity','>',0)->inRandomOrder()->limit(10)->get();
        // $sale_pets = Product::where('quantity','>',0)->where('sale','>','0')->inRandomOrder()->limit(3)->get();
        // return view("frontend.home_page",compact('popular_pets','sale_pets','slides','banners'));
    }
}
