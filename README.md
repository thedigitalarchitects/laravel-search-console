# laravel-google-analytics-admin
Google Analytics Admin for Laravel

Based on: https://developers.google.com/analytics/devguides/config/admin/v1

V0.1

Requirements
•  PHP >= 8.1

•  Composer

•  Laravel >= 8.0

•  Oauth2 Google Token

This package is using oAuth2 and it doens't authenticate with Google, we recommend to use Socialite to do this connection
It is necessary this scope 
```php
https://www.googleapis.com/auth/analytics.edit
```

Installation
```bash
composer require tda/laravel-google-analytics-admin
```

## Usage
Inside Laravel:

```php
use Tda\LaravelGoogleAnalyticsAdmin\GoogleAnalyticsAdmin;
$analytics = new GoogleAnalyticsAdmin($token);
```

## Features

### Account

List accounts
```php
$accounts = $analytics->listAccounts();
```

Get Account
Account name e.g.: 'accounts/100'
```php
$account = $analytics->getAccount($account);
```

Update Account
Account name e.g.: 'accounts/100'
Fields updatable: 'displayName', 'regionCode'
```php
$params = ['displayName' => 'New Name', 'regionCode' => 'DE'];
$account = $analytics->updateAccount($account, $params);
```

Delete Account
Account name e.g.: 'accounts/100'
```php
$analytics->deleteAccount($account);
```

### Property

List properties
Account name e.g.: 'accounts/100'
```php
$properties = $analytics->listProperties($account);
```

Get Property
Property name e.g.: 'properties/1000'
```php
$analytics->getProperty($property);
```

Create Property
Fields: 
{
    'parent': string
    'currencyCode': string
    'displayName': string
    'industryCategory': enum
    'propertyType': enum
    'timeZone': string
    'serviceLevel': enum
    'account': string
}
```php
$params = [
    'parent' => 'accounts/100',
    'currencyCode' => 'EUR',
    'displayName' => "GA 4 property",
    'industryCategory' => 'OTHER',
    "propertyType" => "PROPERTY_TYPE_ORDINARY",
    "timeZone" => "Europe/Berlin",
    'account' => 'accounts/100',
];
$property = $analytics->createProperty($params);
```
To get all Propreties enum
```php
$enums = $analytics->getPropertiesResource();
```

Update Property
Property name e.g.: 'properties/1000'
Fields updatable: 'displayName', 'industryCategory', 'timeZone', 'currencyCode'
```php
$params = [
    'displayName' => 'Update GA 4 property', 
    'industryCategory' => 'TECHNOLOGY', 
    'timeZone' => 'America/New_York', 
    'currencyCode' => 'USD'
];
$property = $analytics->updateProperty($property, $params);
```

Delete Property
Account name e.g.: 'property/1000'
```php
$analytics->deleteProperty(property);
```

