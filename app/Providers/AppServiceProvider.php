<?php

namespace App\Providers;

use App\Domain\User\Repositories\TransactionRepository;
use App\Domain\User\Repositories\UserRepository;
use App\Infrastructure\Repositories\EloquentTransactionRepository;
use App\Infrastructure\Repositories\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(TransactionRepository::class, EloquentTransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
