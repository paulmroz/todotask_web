<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view) {

            $archives =\App\Task::archives();

            /*$tags =  \App\Tag::has('tasks')->pluck('name');*/

            $tags =  \App\Task::where('user_id',auth()->id())->has('tags')->with('tags')->get();
          
            $view->with(compact('archives', 'tags'));
    
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }
}
