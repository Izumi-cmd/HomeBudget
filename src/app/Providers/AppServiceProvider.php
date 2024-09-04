<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();
        Paginator::useBootstrap();

        // 全カテゴリを取得して全てのビューに渡す
        View::share('categories', $this->getAllCategories());
    }

    private function getAllCategories()
    {
        return Category::all();
    }
}
