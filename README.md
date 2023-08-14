# Laravel Search Console

Based on schulzefelix/laravel-search-console and modified to Laravel 8

Using this package you can easily retrieve data from Google Search Console API.

Here are a few examples of the provided methods:

```php
use SearchConsole;

//list all available sites for that token
SearchConsole::setAccessToken($token)->listSites();

//get site details (permissionLevel) for specific site
SearchConsole::setAccessToken($token)->getSite('http://blog.example.com/');
```


## Install

This package can be installed through Composer.

``` bash
$ composer require tda/laravel-search-console
```

## Usage

Here are two basic example to retrieve all sites and an export for search analytics data.
### List Sites

```php
$sites = SearchConsole::setAccessToken($token)->listSites();
```

### Search Analytics

```php
use SearchConsole;
use SchulzeFelix\SearchConsole\Period;

    $data = SearchConsole::setAccessToken($token)->setQuotaUser('uniqueQuotaUserString')
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

### Set Access Token (Required)

```php
$sites = SearchConsole::setAccessToken($token)->listSites();
```

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

## Security

If you discover any security related issues, please email github@schulze.co instead of using the issue tracker.

## Credits

- [Davi Leichs]
- [Felix Schulze]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/davileichs
[link-felix]: https://github.com/schulzefelix
