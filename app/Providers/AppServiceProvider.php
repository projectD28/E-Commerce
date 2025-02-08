<?php

namespace App\Providers;

use App\Service\Order\OrderInterface;
use App\Service\Order\OrderService;
use App\Service\Produk\ProdukInterface;
use App\Service\Produk\ProdukService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProdukInterface::class, ProdukService::class);
        $this->app->bind(OrderInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
