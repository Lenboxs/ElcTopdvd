<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadService\UploadService;

class UploadServiceProvider extends ServiceProvider
{
    protected $defer = true;
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
        $this->app->bind( 'App\Services\UploadService\Contracts\UploadInterface', function(){

            return new UploadService();

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Services\UploadService\Contracts\UploadInterface'];
    }
}
