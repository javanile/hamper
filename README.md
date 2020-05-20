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

* [Data manipulation](#Data-manipulation)
    * [Execute query](#Execute-query)
    * [Fetches the next row from the result set rows by the given parametric query](#Fetches-the-next-row-from-the-result-set-rows-by-the-given-parametric-query)
    * [Returns an array containing all of the result set rows by the given parametric query](#Returns-an-array-containing-all-of-the-result-set-rows-by-the-given-parametric-query)
    * [Inserts the given record within the selected table](#Inserts-the-given-record-within-the-selected-table)
    * [Inserts the given record within the selected table](#Inserts-the-given-record-within-the-selected-table)
    * [Updates the given record with the given data](#Updates-the-given-record-with-the-given-data)
    * [Deletes the given record within the given table](#Deletes-the-given-record-within-the-given-table)
* [Tables manipulation](#Tables-manipulation)
    * [Create new table](#Create-new-table)


### Data manipulation
#### Execute query

Executes the given parametric query

##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

```php
<?php
//
// Execute simple query
//
$hdb->query("SET NAMES utf8");
```

```php
<?php
//
// Execute prepare query
//
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

[[back to top]](#Documentation)

#### Fetches the next row from the result set rows by the given parametric query



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

#### Returns an array containing all of the result set rows by the given parametric query



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

#### Inserts the given record within the selected table



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

#### Inserts the given record within the selected table



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

#### Updates the given record with the given data



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

#### Deletes the given record within the given table



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

[[back to top]](#Documentation)

### Tables manipulation
#### Create new table



##### Usage 

```
query($sql, $params = [], $options = [])
```

##### Examples

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
