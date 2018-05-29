<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings;
use App\SocialMedia;
use App\Recaptcha;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Settings::orderBy( 'id', 'desc' )->first();

        if( !empty( $settings['attributes'] ) )
        {
            foreach( $settings['attributes'] as $key => $value )
            {
                \Config::set( 'settings.' .  $key, $value );
            }
        }

        $socialmedia = SocialMedia::orderBy( 'id', 'desc' )->first();

        if( !empty( $socialmedia['attributes'] ) )
        {
            foreach( $socialmedia['attributes'] as $key => $value )
            {
                \Config::set( 'settings.' .  $key, $value );
            }
        }

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        if( !empty( $recaptcha['attributes'] ) )
        {
            foreach( $recaptcha['attributes'] as $key => $value )
            {
                \Config::set( 'settings.' .  $key, $value );
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
