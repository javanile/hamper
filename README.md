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
    1. [Fetch one record](#Fetch-one-record)
    1. [Fetch record list](#Fetch-record-list)
    1. [Insert one record](#Insert-one-record)
    1. [Update one record CIAO](#Update-one-record-CIAO)
    1. [Delete one record](#Delete-one-record)
1. [Tables manipulation](#Tables-manipulation)
    1. [Create new table](#Create-new-table)


### Data manipulation
#### Execute query

`$hdb->query(...)`



[[back to top]](#Documentation)

#### Fetch one record

`$hdb->fetch(...)`



[[back to top]](#Documentation)

#### Fetch record list

`$hdb->fetchAll(...)`



[[back to top]](#Documentation)

#### Insert one record

`$hdb->insert(...)`



[[back to top]](#Documentation)

#### Update one record CIAO

`$hdb->update(...)`



[[back to top]](#Documentation)

#### Delete one record

`$hdb->delete(...)`



[[back to top]](#Documentation)

### Tables manipulation
#### Create new table

`$hdb->create(...)`



[[back to top]](#Documentation)



## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ make install
```

```bash
$ make tdd take=tests/HamperDatabaseTest.php 
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email bianco@javanile.org instead of using the issue tracker.

## Socialware

We highly appreciate if you create a social post on facebook or twitter with following hashtag:

- [#javanile](#Socialware)
- [#hamper](#Socialware)

## Credits

- [Francesco Bianco](https://github.com/francescobianco)
- [All Contributors](../../contributors) 

## Support us

Javanile is a community project agency based in Sicily, Italy. 
You'll find an overview of all our projects [on our website](https://www.javanile.org).

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/javanile). 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
