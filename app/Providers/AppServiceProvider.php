<?php

namespace App\Providers;

use App\Events\WhenTeacherCreatedEvent;
use App\Listeners\WhenTeacherCreatedListener;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Psy\Readline\Hoa\Event;
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
        Schema::defaultStringLength(191);
        \Illuminate\Support\Facades\Event::listen(
            WhenTeacherCreatedEvent::class,
            WhenTeacherCreatedListener::class
        );

    }
}
