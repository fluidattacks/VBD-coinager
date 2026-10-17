<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     */
    protected function gate(): void
    {
        \Illuminate\Support\Facades\Gate::define('viewHorizon', function (?\App\Models\User $user = null): bool {
            return app()->environment(config('service.targets'));
        });
    }
}
