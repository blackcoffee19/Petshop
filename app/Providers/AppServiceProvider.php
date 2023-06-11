<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\TypeProduct;
use App\Models\Breed;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Groupmessage;
use App\Models\Message;
use App\Models\News;
use App\Models\User;
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
                if(Auth::user()->admin != 1){
                    $groups = Groupmessage::where('id_user1','=',Auth::user()->id_user)->get();
                    // GET MESSAGES THAT ADMIN STILL NOT REPLY 
                    $messages_to_admin = Message::where('code_group','=',null)->where('id_user','=',Auth::user()->id_user)->get();
                    $view->with('groups',$groups);
                    $view->with('messages_to_admin',$messages_to_admin);
                }else{
                    $groups = Groupmessage::where('id_user2','=',Auth::user()->id_user)->get();
                    // GET ALL USER MESSAGE TO ADMIN THAT STILL NOT REPLY 
                    $user_mess=  User::whereIn('id_user',Message::select('id_user')->where('code_group','=',null)->distinct()->get())->get();
                    $view->with('groups',$groups);
                    $view->with('user_message',$user_mess);
                }
            }
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
                $news = News::where('send_admin', '=', false)->where(function (Builder $query) {
                    $query->where('id_user', '=', Auth::user()->id_user)
                                                                              ->orWhere('id_user', '=', null);
                                                                    })->get();
                $view->with('news',$news);
            }
	    });
        view()->composer('layout.notification',function($view){
            if(Auth::check()){
                $news = News::where('send_admin','=',true)->get();
                $view->with('news',$news);
            }
	    });
    }
}
