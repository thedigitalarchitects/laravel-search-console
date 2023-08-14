# Laravel Search Console

Based on schulzefelix/laravel-search-console and modified to Laravel 8

Using this package you can easily retrieve data from Google Search Console API.

Here are a few examples of the provided methods:



## Install

This package can be installed through Composer.

``` bash
$ composer require tda/laravel-search-console
```

## Usage

Here are two basic example to retrieve all sites and an export for search analytics data.
### List Sites

```php
use Tda\GoogleSearchConsole\SearchConsole;
$searchConsole = new SearchConsole();
$sites = $searchConsole->setAccessToken($this->token)->listSites();

//get site details (permissionLevel) for specific site
$site = $searchConsole->setAccessToken($token)->getSite('http://blog.example.com/');

```

### Search Analytics

```php
use Tda\GoogleSearchConsole\SearchConsole;
use Tda\SearchConsole\Period;

    $searchConsole = new SearchConsole();
    $data = $searchConsole->setAccessToken($this->token)->setQuotaUser('uniqueQuotaUserString')
        ->searchAnalyticsQuery(
            'https://www.example.com/',
            Period::create(Carbon::now()->subDays(30), Carbon::now()->subDays(2)),
            ['query', 'page', 'country', 'device', 'date'],
            [['dimension' => 'query', 'operator' => 'notContains', 'expression' => 'cheesecake']],
            1000,
            'web',
            'all',
            'auto'
        );
```

## Provided methos
### Retrieve One Site
```php
public function public function getSite(string $siteUrl): array
```

### Retrieve All Sites
```php
public function public function listSites(): Collection
```

### Retrieve Search Analytics Data
```php
public function searchAnalyticsQuery(string $siteUrl, Period $period, array $dimensions = [], array $filters = [], int $rows = 1000, string $searchType = 'web', string $dataState = 'final', string $aggregationType = 'auto'): Collection
```

### Check Access Token
```php
public function public function isAccessTokenExpired(): Bool
```

## Provided fluent configuration


### Set Quota User
To avoid to the API limits, you can provide a unique string for the authenticated account.

More information: https://developers.google.com/webmaster-tools/search-console-api-original/v3/limits
```php
$sites = SearchConsole::setAccessToken($token)->setQuotaUser('uniqueQuotaUserString')->listSites();
```

## Get Underlying Service
You can get access to the underlying `Google_Service_Webmasters` object:

```php
SearchConsole::getWebmastersService();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## Credits

- [Davi Leichs][link-author]
- [Felix Schulze][link-felix]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/davileichs
[link-felix]: https://github.com/schulzefelix/laravel-search-console
