<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\TypeProduct;
use App\Models\Breed;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
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
        $types= TypeProduct::all();
        $breeds = Breed::all();
        view()->share('types', $types);
        view()->share('breeds', $breeds);
        view()->composer('frontend.signin',function($view){
            $random_pet = Product::inRandomOrder()->limit(3)->get();
            $view->with('random_pet',$random_pet);
        });
    }
}
