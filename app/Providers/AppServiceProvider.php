<?php

namespace App\Providers;

use App\Service\Repository\ChapterRepository;
use App\Service\Repository\FollowRepository;
use App\Service\Repository\GenreRepository;
use App\Service\Repository\Impl\ChapterRepositoryImpl;
use App\Service\Repository\Impl\FollowRepositoryImpl;
use App\Service\Repository\Impl\GenreRepositoryImpl;
use App\Service\Repository\Impl\LikeRepositoryImpl;
use App\Service\Repository\Impl\MangaDetailRepositoryImpl;
use App\Service\Repository\Impl\MangaStatusRepositoryImpl;
use App\Service\Repository\Impl\UserRepositoryImpl;
use App\Service\Repository\Impl\ViewRepositoryImpl;
use App\Service\Repository\LikeRepository;
use App\Service\Repository\MangaDetailRepository;
use App\Service\Repository\MangaStatusRepository;
use App\Service\Repository\UserRepository;
use App\Service\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use function Symfony\Component\Translation\t;

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
        $this->app->singleton(MangaStatusRepository::class, function () {
            return new MangaStatusRepositoryImpl();
        });
        $this->app->singleton(MangaDetailRepository::class, function () {
            return new MangaDetailRepositoryImpl();
        });
        $this->app->singleton(ChapterRepository::class, function () {
            return new ChapterRepositoryImpl();
        });
        $this->app->singleton(ViewRepository::class, function () {
            return new ViewRepositoryImpl();
        });
        $this->app->singleton(FollowRepository::class, function () {
            return new FollowRepositoryImpl();
        });
        $this->app->singleton(LikeRepository::class, function () {
            return new LikeRepositoryImpl();
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
