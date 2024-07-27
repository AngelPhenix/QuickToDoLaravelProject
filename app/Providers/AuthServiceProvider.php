<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Board;
use App\Policies\BoardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Register the Board policy
        Board::class => BoardPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
