<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Post;
use Illuminate\Support\Facades\View;
use App\Slider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year','month')->orderBy('year', 'desc')->get()->toArray();

            $view->with('archives', $archives);
        });

        View::composer('*', function ($view) {

            $categories = Category::get()->all();

            $view->with('categories', $categories);
        });

        View::composer('*', function ($view) {

            $menuCategories = Category::limit(7)->get()->all();

            $view->with('menuCategories', $menuCategories);
        });

        View::composer('*', function ($view) {

            $slider = Slider::get()->all();

            $view->with('slider', $slider);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
