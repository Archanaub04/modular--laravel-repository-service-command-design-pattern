<?php

namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Users\Handlers\UserCommandHandler;
use Modules\Users\Interfaces\UserInterface;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Services\UserService;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);

        // Bind Service
        $this->app->bind(
            UserService::class,
            function ($app) {
                return new UserService($app->make(UserInterface::class));
            }
        );

        // Bind Command Handler
        $this->app->bind(
            UserCommandHandler::class,
            function ($app) {
                return new UserCommandHandler(
                    $app->make(UserService::class)
                );
            }
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
