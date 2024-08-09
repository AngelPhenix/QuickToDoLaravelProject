<?php

namespace App\Providers;

use App\Models\Board;
use App\Policies\BoardPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('boardList', optional(Auth::user())->boards);
        // Gate::policy(Board::class, BoardPolicy::class);
    }
}
