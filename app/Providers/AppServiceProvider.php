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
        \Blade::if('admin', function () {
            return auth()->check() && auth()->user()->admin;
        });

        view()->composer('layouts.sidebar', function ($view) {
            $archives =\App\Task::archives();

            /*$tags =  \App\Tag::has('tasks')->pluck('name');*/

            //$tags =  \App\Task::where('user_id',auth()->id())->has('tags')->with('tags')->get();
            $tags_names = \App\Task::where('user_id', auth()->id())->has('tags')->with('tags')->get();
            $tags_with_dupliaction = [];
            foreach ($tags_names as $tag) {
                $tagname = $tag->tags->pluck('name');
                // var_dump($tagname);
                foreach ($tagname as $name) {
                    $tags_with_dupliaction [] = $name;
                }
            }
            asort($tags_with_dupliaction);
            $tags = array_count_values($tags_with_dupliaction);

            
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
