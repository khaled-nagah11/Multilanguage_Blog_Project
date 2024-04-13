<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
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
        $settings = Setting::checkSettings();
        $categories = Category::with('children')->where('parent',0)->orWhere('parent',null)->get();
        view()->share([
           'setting'=>$settings,
            'categories'=>$categories,
        ]);

    }
}
