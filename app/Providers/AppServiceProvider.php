<?php

namespace App\Providers;

use App\Repositories\Accounts\AccountsRepository;
use App\Repositories\Configuration\ConfigurationRepository;
use App\Repositories\Home\HomeRepository;
use App\Repositories\Interfaces\Account\AccountInterface;
use App\Repositories\Interfaces\Configurations\ConfigurationInterface;
use App\Repositories\Interfaces\Home\HomeInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ConfigurationInterface::class, ConfigurationRepository::class);
        $this->app->bind(HomeInterface::class, HomeRepository::class);
        $this->app->bind(AccountInterface::class, AccountsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
