# php-phone-validation

Integrate the powerful [Phone Validation API from Abstract](https://www.abstractapi.com/phone-validation-api) in your PHP project in a few lines of code.

Abstract's Phone Number Validation and Verification API is a fast, lightweight, modern, and RESTful JSON API for determining the validity and other details of phone numbers from over 190 countries.

It's very simple to use: you only need to submit your API key and a phone number, and the API will respond as assessment of its validity, as well as additional details like the carrier details, line type, region and city details, and more.

Validating and verifying phone numbers is a critical step to reducing the chances of low quality data and fraudulent or risky users in your website or application.

# Documentation

## Supported PHP Versions

This library supports the **PHP version 5.6** and higher.

## Installation

You can install **php-phone-validation** via composer or by downloading the source.

### Via Composer:

**php-phone-validation** is available on Packagist as the
[`abstractapi/php-phone-validation`](https://packagist.org/packages/abstractapi/php-phone-validation) package:

```bash
composer require abstractapi/php-phone-validation
```

## API key

Get your API key for free and without hassle from the [Abstact website](https://app.abstractapi.com/users/signup?target=/api/phone-validation/pricing/select).

## Quickstart

### Verify phone

```php
// Verify phone using Abstract's Phone  Validation and Verification API and PHP
<?php
$api_key = "YYYYYY"; // Your API Key from https://app.abstractapi.com/api/phone-validation/documentation

Abstractapi\PhoneValidation\AbstractPhoneValidation::configure($api_key);

$info = Abstractapi\PhoneValidation\AbstractPhoneValidation::verify('+14152007986');

print $info->country->code;

```

## API response

The API response is returned in a `IpGeolocationData` object.

| PARAMETER | TYPE | DETAILS |
| - | - | - |
| number | String | The phone number submitted for validation and verification. |
| valid | Boolean | Is true if the phone number submitted is valid. |
| local_format | String | The local or national format of the submitted phone number. For example, it removes any international formatting, such as "+1" in the case of the US. |
| international_format | String | The international format of the submitted phone number. This means appending the phone number's country code and a "+" at the beginning. |
| country_name | String | The name of the country in which the phone number is registered. |
| country_code | String | The country's two letter ISO 3166-1 alpha-2 code. |
| country_prefix | The country's calling code prefix. |
| registered_location | String | As much location details as are available from our data. This can include the region, state / province, and in some cases down to the city. |
| carrier | String | The carrier that the number is registered with. |
| line_type | String | The type of phone number. The possible values are: Landline, Mobile, Satellite, Premium, Paging, Special, Toll_Free, and Unknown. |

## Detailed documentation

You will find additional information and request examples in the [Abstract help page](https://app.abstractapi.com/api/phone-validation/documentation).

## Getting help

If you need help installing or using the library, please contact [Abstract's Support](https://app.abstractapi.com/api/phone-validation/support).

For bug report and feature suggestion, please use [this repository issues page](https://github.com/abstractapi/php-phone-validation/issues).

# Contribution

Contributions are always welcome, as they improve the quality of the libraries we provide to the community.

Please provide your changes covered by the appropriate unit tests, and post them in the [pull requests page](https://github.com/abstractapi/php-phone-validation/pulls).

## Composer

To work on the source code, you need to install composer on your local computer. At the time of writing, the latest version of composer is v2.0.12. The installation instructions can be found here: https://getcomposer.org/download/.

## Setup

To install the requirements, run:

```bash
composer install --prefer-source --no-interaction --ignore-platform-reqs
```

Once you implementer all your changes and the unit tests, run the following command to run the tests:

```bash
php vendor/bin/phpunit
```
