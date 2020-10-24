<?php

namespace App\Providers;

use App\Service\Payment\PaymentCredentialInterface;
use App\Service\Payment\PaymentCredentialRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentCredentialInterface::class, PaymentCredentialRepo::class);
        //
    }
}
