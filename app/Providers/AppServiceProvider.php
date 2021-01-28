<?php

namespace App\Providers;

use Core\Acace\Client\Application\Create\{CreateClientCommandHandler, CreateClientCommand};
use Illuminate\Contracts\Bus\Dispatcher;
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
        $this->app->bind(
            "Core\Acace\Client\Domain\Contracts\ClientRepositoryContract",
            "Core\Acace\Client\Infrastructure\Persistence\EloquentClientRepository",
        );

        $this->app->bind(
            "Core\Acace\Shared\Domain\Bus\CommandBus",
            "Core\Acace\Shared\Infrastructure/Bus/Command/LaravelCommandBus"
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        $dispatcher->map([
            CreateClientCommand::class => CreateClientCommandHandler::class
        ]);
    }
}
