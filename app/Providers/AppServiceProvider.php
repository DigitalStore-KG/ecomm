<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('customer.layout.sidebar', function($view){
            $c=DB::table('categories')->whereNull('category_id')->get();
            $view->with('sideCategories',$c);
        });
        view()->composer('customer.layout.sidebar', function($view){
            $sc=DB::table('categories')->whereNotNull('category_id')->get();
            $view->with('sideSubCategories',$sc);
        });
    }
}
