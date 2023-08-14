<?php

namespace Tda\GoogleSearchConsole;

use Illuminate\Support\ServiceProvider;
use Tda\GoogleSearchConsole\SearchConsole;

class GoogleSearchConsoleServiceProvider extends ServiceProvider
{
    public function registeringPackage()
    {
        $this->app->alias(SearchConsole::class, 'laravel-google-search-console');

    }
}
