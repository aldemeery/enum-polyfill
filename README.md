# SplEnum

This is a polyfill for the `SplEnum` type from the [PECL extension](http://pecl.php.net/package/SPL_Types), so you don't have
to download and install the extension on you server.

SplEnum gives the ability to emulate and create enumeration objects natively in PHP.

## Example
<small>From the [php.net documentation](http://php.net/manual/en/class.splenum.php#splenum.examples).</small>

```php
<?php
class Month extends \SplEnum {
    const __default = self::January;

    const January = 1;
    const February = 2;
    const March = 3;
    const April = 4;
    const May = 5;
    const June = 6;
    const July = 7;
    const August = 8;
    const September = 9;
    const October = 10;
    const November = 11;
    const December = 12;
}

echo new Month(Month::June) . PHP_EOL;

try {
    new Month(13);
} catch (\UnexpectedValueException $uve) {
    echo $uve->getMessage() . PHP_EOL;
}
?>
```
The above example will output
```
6
Value not a const in enum Month
```

## Class sypnosis

```php
abstract class SplEnum
{
    /* Constants */
    const NULL __default = NULL ;

    /* Methods */
    SplType::__construct ([ mixed $initial_value ] )

    public array getConstList ([ bool $include_default = FALSE ] )

}
```

## Predefined Constants
```php
/* The default value of the enum */
SplEnum::__default
```

## Methods

#### SplType::\_\_construct
The `SplEnum` constructor.
```php
SplType::__construct ([ mixed $initial_value ] )
```

#### Parameters
`initial_value`
The initial value of the enum.

#### Errors/Exceptions
Throws an `UnexpectedValueException` if incompatible type is given.

---

#### SplEnum::getConstList
Returns all the consts as an array
```php
public array SplEnum::getConstList ([ bool $include_default = false ] )
```
#### Parameters
`include_default`
Whether to include \_\_default property.

## Author
 - Osama Aldemeery <aldemeery@gmail.com>
