<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Product;

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
        Product::created(function($product){
            Product::where('id',$product->id)->update(['SKU' => 'PRO_'.$product->id]);
        });
    }
}
