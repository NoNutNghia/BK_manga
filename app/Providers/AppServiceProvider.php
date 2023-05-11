<?php

namespace App\Providers;

use App\Service\Repository\GenreRepository;
use App\Service\Repository\Impl\GenreRepositoryImpl;
use App\Service\Repository\Impl\UserRepositoryImpl;
use App\Service\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, function () {
            return new UserRepositoryImpl();
        });
        $this->app->singleton(GenreRepository::class, function () {
            return new GenreRepositoryImpl();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
//        if (!empty( env('NGROK_URL') ) && $request->server->has('HTTP_X_ORIGINAL_HOST')) {
//            $this->app['url']->forceRootUrl(env('NGROK_URL'));
//        }
    }
}
