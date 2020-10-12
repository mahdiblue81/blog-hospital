<?php

namespace App\Providers;

use DateTime;
use DateTimeZone;
use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        function vmsTehranDate()
        {
            // $tehran = new DateTimeZone("Asia/Tehran");
            // $london = new DateTimeZone("Europe/London");
            // $dateDiff = new DateTime("now", $london);
            // $timeOffset = $tehran->getOffset($dateDiff);
            // $newtime = time() + $timeOffset;
            date_default_timezone_set('Asia/Tehran');
            $timestamp = time();
            $date_time = date("H:i", $timestamp);
            return $date_time;
        }

        view()->composer('*', function ($view) {
            $timeOn = vmsTehranDate() . ' دقیقه  ';
            return $view->with('timeOn', $timeOn);
        });
    }
}
