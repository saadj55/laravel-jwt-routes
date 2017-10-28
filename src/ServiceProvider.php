<?php
namespace Saad\LaravelJWT;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $configPath = '../config/laravel-jwt.php';

    public function register(){
        $this->mergeConfigFrom($this->configPath, 'laravel-jwt');
    }
    public function boot(){
        $configPath = '../config/laravel-jwt.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');

    }
    public function getConfigPath(){
        return '../config/laravel-jwt.php';
    }
}