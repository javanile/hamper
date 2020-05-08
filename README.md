# hamper

Developer friendly database library for vtiger

## Installation

You can install the package via composer:

```bash
composer require javanile/hamper
```

## Usage

You simply get your `$hdb` object to access on database

```php
use Javanile\Hamper\Hamper;

$hdb = Hamper::getInstance();
```

## Documentation

1. [Data manipulation](#Data-manipulation)
    1. [Execute query](#Execute-query)
    1. [](#)
    1. [](#)
    1. [](#)
    1. [](#)
    1. [](#)
1. [Tables manipulation](#Tables-manipulation)
    1. [](#)


### Data manipulation
#### Execute query

`$hdb->query(...)`



#### 

`$hdb->fetch(...)`



#### 

`$hdb->fetchAll(...)`



#### 

`$hdb->insert(...)`



#### 

`$hdb->update(...)`



#### 

`$hdb->delete(...)`



### Tables manipulation
#### 

`$hdb->create(...)`





## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

docker-compose up -d
docker-compose exec vtiger ./vendor/bin/phpunit tests/DatabaseTest.php

```php
$hdb->$hdb->tables->create();
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email bianco@javanile.org instead of using the issue tracker.

## Socialware

You're free to use this package, but if it makes it to your production environment 
we highly appreciate you create a social post on facebook or twitter with following hashtag.

- #javanile
- #hamper

## Credits

- [Francesco Bianco](https://github.com/francescobianco)
- [All Contributors](../../contributors) 

## Support us

Javanile is a community project agency based in Sicily, Italy. 
You'll find an overview of all our open source projects [on our website](https://www.javanile.org).

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/javanile). 
All pledges will be dedicated to allocating workforce on maintenance and new awesome stuff.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
