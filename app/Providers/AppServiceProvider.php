<?php

namespace App\Providers;

use App\Contracts\DocterAccept;
use App\Contracts\DocterReject;
use App\Docter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('DocterAccept',DocterAccept::class);
         $this->app->bind('DocterAccept',function($app,$parametr){
             return new DocterAccept($parametr[0]);
         });

         $this->app->bind('DocterReject',function($app,$parametr){
             return new DocterReject($parametr[0]);
         });

        //  $this->app->bind('App\Contracts\ManagerInterface', function($app,$parametr){

        //     return new DocterReject($parametr[0]);

        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);
    }
}
