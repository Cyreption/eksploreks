<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\AvatarHelper;
use Illuminate\Support\Facades\Blade;

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
        // Register Blade helper for avatar
        Blade::directive('avatar', function ($expression) {
            return "<?php echo \\App\\Helpers\\AvatarHelper::getAvatarUrl({$expression}); ?>";
        });
    }
}
