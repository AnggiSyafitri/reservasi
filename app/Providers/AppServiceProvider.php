<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });
        Blade::directive('totalprice', function ( $expression ) {
            $expression = (int) filter_var($expression, FILTER_SANITIZE_NUMBER_INT);
            if ($expression > 100000) {
                $expression = ($expression * (18.5 / 100)) + $expression;
            }
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
    }
}
