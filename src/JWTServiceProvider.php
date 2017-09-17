<?php
namespace Saad\LaravelJWT;

use Illuminate\Foundation\AliasLoader;
use Tymon\JWTAuth\Providers\JWTAuthServiceProvider;
use \Illuminate\Support\ServiceProvider as ServiceProvider;

class JWTServiceProvider extends ServiceProvider
{
    public function register(){
        $config_path = realpath(__DIR__.'/../config/jwt.php');

        $this->mergeConfigFrom(
            $config_path, 'jwt'
        );
    }
    public function boot(){
        //require __DIR__.'/../vendor/autoload.php';
        $this->app->register(JWTAuthServiceProvider::class);
        AliasLoader::getInstance(['JWTAuth' => 'Tymon\JWTAuth\Facades\JWTAuth', 'JWTFactory' => 'Tymon\JWTAuth\Facades\JWTFactory']);
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }
}