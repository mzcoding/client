<?php
namespace Mzcoding\Laravel;

use Illuminate\Support\ServiceProvider;
use Mzcoding\Dadata\Client; 

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/mzcoding-client.php' => config_path('mzcoding-client.php'),
        ]);
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/mzcoding-client.php', 'mzcoding-client'
        );
        $this->app->bind(Client::class);
    }
}