<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
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
       // Using class based composers...
        View::composer(
            ['layouts.backend.template','admin.activation.activationform'],'App\Http\Views\Composers\SubjectComposer'
        );
    }
}
