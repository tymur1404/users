<?php

namespace App\Providers;

use App\Services\Calculation\CalculationServiceInterface;
use App\Services\Calculation\Calculation1Service;
use App\Services\Calculation\Calculation2Service;
use App\Services\Calculation\Calculation3Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->bind(CalculationServiceInterface::class, function ($app) {
//            return new FirstCalculationService();
//        });
//
//        $this->app->bind(CalculationServiceInterface::class, function ($app) {
//            return new SecondCalculationService();
//        });
//
//        $this->app->bind(CalculationServiceInterface::class, function ($app) {
//            return new ThirdCalculationService();
//        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
