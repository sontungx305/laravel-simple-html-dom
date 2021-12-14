<?php

namespace Sontungx305\LaravelSimpleHtmlDom;

use Sontungx305\LaravelSimpleHtmlDom\SimpleHtmlDom;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SimpleHTMLDom', function ($app) {
            return new SimpleHtmlDom;
        });
    }
}
