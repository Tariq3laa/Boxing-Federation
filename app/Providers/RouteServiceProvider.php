<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public const HOME = '/home';

    public function boot()
    {
        //

        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapCarouselRoutes();
        $this->mapPlayerRoutes();
        $this->mapCoachRoutes();
        $this->mapTecRoutes();
        $this->mapRefereeRoutes();
        $this->mapFounderRoutes();
        $this->mapWriterRoutes();
        $this->mapSponsorRoutes();
        $this->mapNewsRoutes();
        $this->mapOrganizerRoutes();
        $this->mapChampionshipRoutes();
        $this->mapTrainingCategoryRoutes();
        $this->mapTrainingCourseRoutes();
        $this->mapTrainingTraineeRoutes();
        $this->mapContactUSRoutes();
        $this->mapGalleryCategoryRoutes();
        $this->mapGalleryRoutes();
        $this->mapVideoRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapCarouselRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/carousel/carousel.php'));
    }

    protected function mapPlayerRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/player/player.php'));
    }

    protected function mapCoachRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/coach/coach.php'));
    }

    protected function mapTecRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/tec/tec.php'));
    }

    protected function mapRefereeRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/referee/referee.php'));
    }

    protected function mapFounderRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/founder/founder.php'));
    }

    protected function mapWriterRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/writer/writer.php'));
    }

    protected function mapSponsorRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/sponsor/sponsor.php'));
    }

    protected function mapNewsRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/news/news.php'));
    }

    protected function mapOrganizerRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/organizer/organizer.php'));
    }

    protected function mapChampionshipRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/championship/championship.php'));
    }

    protected function mapTrainingCategoryRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/training/category.php'));
    }

    protected function mapTrainingCourseRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/training/course.php'));
    }

    protected function mapTrainingTraineeRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/training/trainee.php'));
    }

    protected function mapContactUSRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/contactUS/contactUS.php'));
    }

    protected function mapConstantRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/constant/constant.php'));
    }

    protected function mapGalleryCategoryRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/gallery/category.php'));
    }

    protected function mapGalleryRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/gallery/gallery.php'));
    }

    protected function mapVideoRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/video/video.php'));
    }
}
