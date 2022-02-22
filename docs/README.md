# Hamper DB

Developer friendly database library for vtiger. Hamper improove the code quality and the readbility of your PHP code around database access and manipulation.

## Why I use it?

Here is a list of compelling reasons to use it

- Avoid old-style loop over results. 
- Use by default associative array for fields.

## Installation

You can install the package via composer:

```bash
composer require javanile/hamper
```

## Usage

You simply get your `$hdb` object to access on database

```php
require_once 'vendor/autoload.php';

use Javanile\Hamper\Hamper;

$hdb = Hamper::getInstance();
```

## Documentation


> The following methods are used to manipulate records into database

 * [Execute query](#-execute-query) - `$hdb->query(...)`
 * [Get a single record](#-get-a-single-record) - `$hdb->fetch(...)`
 * [Get a list of records](#-get-a-list-of-records) - `$hdb->fetchAll(...)`
 * [Get a value from record](#-get-a-value-from-record) - `$hdb->fetchValue(...)`
 * [Get value by key column](#-get-value-by-key-column) - `$hdb->value(...)`
 * [Check if record exists](#-check-if-record-exists) - `$hdb->exists(...)`
 * [Insert a record](#-insert-a-record) - `$hdb->insert(...)`
 * [Get last ID](#-get-last-id) - `$hdb->lastInsertId(...)`
 * [Update a single record](#-update-a-single-record) - `$hdb->update(...)`
 * [Delete a single record](#-delete-a-single-record) - `$hdb->delete(...)`

> The following methods are used to manipulate database tables and fields

 * [Create new table](#-create-new-table) - `$hdb->create(...)`


<hr/>

## `¶` Execute query

Executes the given parametric query

#### Usage 

```
$hdb->query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Get a single record

Fetches the next row from the result set rows by the given parametric query.

#### Usage 

```
$hdb->fetch($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Get a list of records

Returns an array containing all of the result set rows by the given parametric query.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Get a value from record

Fetches the next row from the result set rows by the given parametric query.

#### Usage 

```
$hdb->fetchValue($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
$crmId = $hdb->fetchValue("SELECT crmid FROM vtiger_crmentity WHERE setype=? AND deleted=0", [$module]);
```

#### Legacy

This method replace this kind of legacy code

```php
$adb = \PearDatabase::getInstance();
$result = $adb->pquery("SELECT tabid FROM vtiger_tab WHERE name=?", [$setype]);
$tabId = $adb->query_result($result, 0, "tabid");
```

[[back to top]](#documentation)

<hr/>

## `¶` Get value by key column

Execute a query to check if record with specific key and value exists.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Check if record exists

Execute a query to check if record with specific key and value exists.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Insert a record

Inserts the given record within the selected table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Get last ID

Return last insert ID value for the selected table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Update a single record

Updates the given record with the given data.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Delete a single record

Deletes the given record within the given table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

```php
// Execute simple query
$hdb->query("SET NAMES utf8");
```

```php
// Execute prepare query
$hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
```

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>

## `¶` Create new table



#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

This method is useful to handle this situations

#### Legacy

This method replace this kind of legacy code

[[back to top]](#documentation)

<hr/>



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

We highly appreciate if you create a social post on Twitter with following button

[![Share on Twitter](https://img.shields.io/badge/-share%20on%20twitter-blue?logo=twitter&style=for-the-badge)](https://twitter.com/intent/tweet?text=Hello%20world)

## Credits

This project exists thanks to all the people who contribute.

- [Francesco Bianco](https://github.com/francescobianco)
- [All Contributors](https://github.com/javanile/hamper/graphs/contributors) 

## Support us

Javanile is a community project agency based in Sicily, Italy. 
You'll find an overview of all our projects [on our website](https://www.javanile.org).

Does your business depend on our contributions? Reach out and support us on [Patreon](https://www.patreon.com/javanile). 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
