<?php

namespace JulienMru\PartialCache;

use Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class PartialCacheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/config/partialcache.php' => config_path('partialcache.php'),
        ], 'config');

        $directive = config('partialcache.directive');

        Blade::directive($directive, function ($expression) {
            if (Str::startsWith($expression, '(')) {
                $expression = substr($expression, 1, -1);
            }

            return "<?php echo app()->make('partialcache')
                ->cache(Arr::except(get_defined_vars(), ['__data', '__path']), {$expression}); ?>";
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../resources/config/partialcache.php', 'partialcache');

        $this->app->singleton(PartialCache::class, PartialCache::class);
        $this->app->alias(PartialCache::class, 'partialcache');
    }
}
