<?php

namespace App\Providers;

use App\Repositories\EarnRepository;
use App\Repositories\EarnRepositoryInterface;
use App\Repositories\SpendRepository;
use App\Repositories\SpendRepositoryInterface;
use App\Services\EarnService;
use App\Services\FinanceServiceInterface;
use App\Services\SpendService;
use App\Services\SpendServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FinanceServiceInterface::class, EarnService::class);
        $this->app->bind(SpendServiceInterface::class, SpendService::class);
        $this->app->bind(EarnRepositoryInterface::class, EarnRepository::class);
        $this->app->bind(SpendRepositoryInterface::class, SpendRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
