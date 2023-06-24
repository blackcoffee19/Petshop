<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\TypeProduct;
use App\Models\Breed;
use App\Models\Product;
use App\Models\Library;
use App\Models\Groupmessage;
use App\Models\Message;
use App\Models\News;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        };
        Paginator::useBootstrapFive();
        view()->composer('admin.partials.header',function($view){
            if(Auth::check() && Auth::user()->admin == '1'){
                $notificates = News::where('send_admin','=',true)->get();
                foreach($notificates as $new){
                    $new->image = isset($new->User->image)? $new->User->image: "user.png";
                }
                $view->with('notificates',$notificates);
            };
        });
        view()->composer(['frontend.*','backend.*'],function($view){
            if(Auth::check()){
                if(Auth::user()->admin == '0'){
                     $num = 0;
                    $groups = Groupmessage::where('id_user','=',Auth::user()->id_user)->get();
                    foreach($groups as $gr){
                        $last_mess = $gr->Message->last();
                        if(($last_mess->id_user != Auth::user()->id_user) && (!$last_mess->status)){
                            $num++;
                            $gr->new_mess = true;
                        }
                    }
                    // GET MESSAGES THAT ADMIN STILL NOT REPLY 
                    $messages_to_admin = Message::where('code_group','=',null)->where('id_user','=',Auth::user()->id_user)->get();
                    $view->with('num_new',$num);
                    $view->with('groups',$groups);
                    $view->with('messages_to_admin',$messages_to_admin);
                }else{
                    $num = 0;
                    $groups = Groupmessage::where('id_admin','=',Auth::user()->id_user)->get();
                    foreach($groups as $gr){
                        $last_mess = $gr->Message->last();
                        if(($last_mess->id_user != Auth::user()->id_user)&&(!$last_mess->status)){
                            $num++;
                            $gr->new_mess = true;
                        }
                    }
                    // GET ALL USER MESSAGE TO ADMIN THAT STILL NOT REPLY 
                    $user_mess=  User::whereIn('id_user',Message::select('id_user')->where('code_group','=',null)->distinct()->get())->get();
                    $num += count($user_mess);
                    $view->with('num_new',$num);
                    $view->with('groups',$groups);
                    $view->with('user_message',$user_mess);
                }
            }
            $types= TypeProduct::all();
            $view->with('types',$types);
        });
        view()->composer('frontend.signin',function($view){
            $random_pet = Product::inRandomOrder()->limit(3)->get();
            $view->with('random_pet',$random_pet);
	    });
        view()->composer('layout.header',function($view){
            $types= TypeProduct::all();
            $breeds = Breed::all();
            $view->with('types', $types);
            $view->with('breeds', $breeds);
            if(Auth::check()){
                if(Auth::user()->admin == "0"){
                    $news = News::where('send_admin', '=', false)->where(function (Builder $query) {
                                                                            $query->where('id_user', '=', Auth::user()->id_user)
                                                                                  ->orWhere('id_user', '=', null);
                                                                        })->get();
                    foreach($news as $new){
                        switch($new->link){
                            case "products-details":
                                $new->image =Library::where('id_product','=',intval($new->attr))->first()->image;
                            break;
                            default:
                                $new->image = "feedback.png";
                        };
                    }
                    $view->with('news',$news);
                }else{
                    $news = News::where('send_admin', '=', true)->get();
                    foreach($news as $new){
                        $new->image = isset($new->User->avatar)? $new->User->avatar: "user.png";
                    }
                    $view->with('news',$news);
                    $orders = Order::where('status','=','unconfirmed')->orWhere('status','=','confirmed')->orWhere('status','=','delivery')->orderBy('status','desc')->get();
                    $view->with('orders',$orders);
                }
            }
	    });
        view()->composer('layout.notification',function($view){
            if(Auth::check()){
                $news = News::where('send_admin','=',true)->get();
                $view->with('news',$news);
            }
	    });
        view()->composer('backend.header',function($view){
            if(Auth::check() && Auth::user()->admin == '1'){
                $notificates = News::where('send_admin','=',true)->get();
                foreach($notificates as $new){
                    $new->image = isset($new->User->avatar)? $new->User->avatar: "user.png";
                }
                $view->with('notificates',$notificates);
            };
        });
    }
}
