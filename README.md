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

#### The following methods are used to manipulate records into database

 * [Execute query](#Execute-query)
 * [Get a single record](#Get-a-single-record)
 * [Get a list of records](#Get-a-list-of-records)
 * [Single value by query](#Single-value-by-query)
 * [Get value from if record exists](#Get-value-from-if-record-exists)
 * [Check if record exists](#Check-if-record-exists)
 * [Insert a record](#Insert-a-record)
 * [Get last ID](#Get-last-ID)
 * [Update a single record](#Update-a-single-record)
 * [Delete a single record](#Delete-a-single-record)
#### The following methods are used to manipulate database tables and fields

 * [Create new table](#Create-new-table)


<hr/>

### Execute query

Executes the given parametric query

#### Usage 

```
$hdb->query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Get a single record

Fetches the next row from the result set rows by the given parametric query.

#### Usage 

```
$hdb->fetch($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Get a list of records

Returns an array containing all of the result set rows by the given parametric query.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Single value by query

Fetches the next row from the result set rows by the given parametric query.

#### Usage 

```
$hdb->fetchValue($sql, $params = [], $options = [])
```

#### Examples

```php
<?php
$crmId = $hdb->fetchValue("SELECT crmid FROM vtiger_crmentity WHERE setype=? AND deleted=0", [$module]);
```

#### Legacy

```php
<?php
$adb = \PearDatabase::getInstance();
$result = $adb->pquery("SELECT tabid FROM vtiger_tab WHERE name=?", [$setype]);
$tabId = $adb->query_result($result, 0, "tabid");
```

[[back to top]](#Documentation)

<hr/>

### Get value from if record exists

Execute a query to check if record with specific key and value exists.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Check if record exists

Execute a query to check if record with specific key and value exists.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Insert a record

Inserts the given record within the selected table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Get last ID

Return last insert ID value for the selected table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Update a single record

Updates the given record with the given data.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Delete a single record

Deletes the given record within the given table.

#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

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

#### Legacy

[[back to top]](#Documentation)

<hr/>

### Create new table



#### Usage 

```
query($sql, $params = [], $options = [])
```

#### Examples

#### Legacy

[[back to top]](#Documentation)

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
