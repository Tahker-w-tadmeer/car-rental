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
        Blade::directive('alpine', function (string $variables) {
            return <<<DIRECTIVE
                <?php
                    \$data = array_combine(
                        array_map(
                            fn (\$variable) => str_replace('$', '', \$variable),
                            explode(',', '$variables')
                        ),
                        [$variables]
                    );
                    \$replaced = str_replace(["'", '"'], ["\'", "'"], json_encode(\$data));
                    if (str_starts_with(\$replaced, '{')) {
                        \$replaced = substr(\$replaced, 1);
                    }
                    if (str_ends_with(\$replaced, '}')) {
                        \$replaced = substr(\$replaced, 0, -1);
                    }
                    echo \$replaced;
                ?>
            DIRECTIVE;
        });
    }
}
