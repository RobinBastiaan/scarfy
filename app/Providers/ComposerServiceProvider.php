<?php

namespace App\Providers;

use App\Http\ViewComposers\UsefulLinksComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(): void
    {
        // Using class based composers...
        View::composer(
            'components.useful-links', UsefulLinksComposer::class
        );

        // Using Closure based composers...
        View::composer('dashboard', static function ($view) {
            //
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}
