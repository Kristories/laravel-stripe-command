# Laravel Stripe Command

[![Build Status](https://travis-ci.org/kristories/laravel-stripe-command.svg?branch=master)](https://travis-ci.org/kristories/laravel-stripe-command)
[![styleci](https://styleci.io/repos/229574465/shield)](https://styleci.io/repos/229574465)
[![Coverage Status](https://coveralls.io/repos/github/kristories/laravel-stripe-command/badge.svg?branch=master)](https://coveralls.io/github/kristories/laravel-stripe-command?branch=master)

[![Packagist](https://img.shields.io/packagist/v/kristories/laravel-stripe-command.svg)](https://packagist.org/packages/kristories/laravel-stripe-command)
[![Packagist](https://poser.pugx.org/kristories/laravel-stripe-command/d/total.svg)](https://packagist.org/packages/kristories/laravel-stripe-command)
[![Packagist](https://img.shields.io/packagist/l/kristories/laravel-stripe-command.svg)](https://packagist.org/packages/kristories/laravel-stripe-command)

[Stripe](http://stripe.com) Command for Laravel

## Installation

Install via composer
```bash
composer require kristories/laravel-stripe-command
```

## Usage

#### Balance

##### Retrieve balance

```bash
▶ php artisan stripe:balance:retrieve

+--------+----------+-----------+
| Amount | Currency | Status    |
+--------+----------+-----------+
| 498895 | usd      | available |
| 844    | usd      | pending   |
+--------+----------+-----------+
```

#### Balance Transaction

##### List all balance transactions

```bash
▶ php artisan stripe:balance-transaction:all

+--------------------+--------+--------------+------------+----------+-----------------------+---------------+------+--------+-----------+--------+
| ID                 | Amount | Available on | Created    | Currency | Description           | Exchange rate | Fee  | Net    | Status    | Type   |
+--------------------+--------+--------------+------------+----------+-----------------------+---------------+------+--------+-----------+--------+
| txn_xxxxxxxxxxxxxx | 900    | 1577491200   | 1576962199 | usd      | Subscription creation |               | 56   | 844    | pending   | charge |
| txn_xxxxxxxxxxxxxx | 2000   | 1507420800   | 1506845432 | usd      |                       |               | 88   | 1912   | available | charge |
| txn_xxxxxxxxxxxxxx | 123456 | 1507420800   | 1506845285 | usd      |                       |               | 3610 | 119846 | available | charge |
| txn_xxxxxxxxxxxxxx | 123456 | 1507420800   | 1506845251 | usd      |                       |               | 3610 | 119846 | available | charge |
| txn_xxxxxxxxxxxxxx | 123456 | 1507420800   | 1506845154 | usd      |                       |               | 3610 | 119846 | available | charge |
| txn_xxxxxxxxxxxxxx | 123456 | 1507420800   | 1506844973 | usd      |                       |               | 3610 | 119846 | available | charge |
| txn_xxxxxxxxxxxxxx | 500    | 1507420800   | 1506840600 | usd      |                       |               | 45   | 455    | available | charge |
| txn_xxxxxxxxxxxxxx | 123    | 1507420800   | 1506839743 | usd      |                       |               | 34   | 89     | available | charge |
| txn_xxxxxxxxxxxxxx | 123    | 1507420800   | 1506839741 | usd      |                       |               | 34   | 89     | available | charge |
| txn_xxxxxxxxxxxxxx | 123    | 1507420800   | 1506839741 | usd      |                       |               | 34   | 89     | available | charge |
+--------------------+--------+--------------+------------+----------+-----------------------+---------------+------+--------+-----------+--------+
```

##### Retrieve a balance transaction

```bash
▶ php artisan stripe:balance-transaction:retrieve txn_xxxxxxxxxxxxxx

+--------------------+--------+--------------+------------+----------+-----------------------+---------------+-----+-----+---------+--------+
| ID                 | Amount | Available on | Created    | Currency | Description           | Exchange rate | Fee | Net | Status  | Type   |
+--------------------+--------+--------------+------------+----------+-----------------------+---------------+-----+-----+---------+--------+
| txn_xxxxxxxxxxxxxx | 900    | 1577491200   | 1576962199 | usd      | Subscription creation |               | 56  | 844 | pending | charge |
+--------------------+--------+--------------+------------+----------+-----------------------+---------------+-----+-----+---------+--------+
```

## Security

If you discover any security related issues, please email `w.kristories@gmail.com` instead of using the issue tracker.

## Credits

- [Wahyu Kristianto](https://github.com/kristories)
- [All contributors](https://github.com/kristories/laravel-stripe-command/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
