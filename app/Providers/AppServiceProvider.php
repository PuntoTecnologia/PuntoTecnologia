<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use app\metakeys;
use DB;
use View;
use app\dolar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $meta_description = DB::table('meta_description')->orderby('id', 'DESC')->limit(1)->get();
        $metakeys = DB::table('metakeys')->orderby('id', 'DESC')->limit(1)->get();
        $my_site = DB::table('my_site')->orderby('id', 'desc')->limit(1)->get();
        $dolar=DB::table('dolar')->orderByraw('id desc')->limit(1)->get();
        view::share(['dolar' => $dolar, 'my_site' => $my_site, 'meta_description' => $meta_description, 'metakeys' => $metakeys]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
