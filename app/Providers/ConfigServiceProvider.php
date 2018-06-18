<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings;
use App\SocialMedia;
use App\Recaptcha;
use Illuminate\Support\Facades\Schema;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
          $settings = Settings::orderBy( 'id', 'desc' )->first();

          if( !empty( $settings['attributes'] ) )
          {
              foreach( $settings['attributes'] as $key => $value )
              {
                  \Config::set( 'settings.' .  $key, $value );
              }
          }
        }

        if (Schema::hasTable('social_media')) {
        $socialmedia = SocialMedia::orderBy( 'id', 'desc' )->first();

        if( !empty( $socialmedia['attributes'] ) )
        {
            foreach( $socialmedia['attributes'] as $key => $value )
            {
                \Config::set( 'settings.' .  $key, $value );
            }
        }
        }

        if (Schema::hasTable('recaptcha'))
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
