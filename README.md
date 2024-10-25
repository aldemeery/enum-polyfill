# SplEnum

> [!WARNING]
> PHP 8.1 introduced native Enumerations (Enums), providing a modern, more efficient approach.
> This package is intended for projects that rely on `SplEnum` and need backward compatibility or cannot upgrade to PHP 8.1+.
>
> If possible, consider using PHP's native enums for improved type safety, performance, and maintainability.

This package is a polyfill for the now-unsupported `SplEnum` class, originally part of the [PECL SPL_Types extension](http://pecl.php.net/package/SPL_Types).

By using this polyfill, you can emulate the `SplEnum` behavior in PHP without relying on the extension, which is no longer actively maintained.

The `SplEnum` class provides a way to create enumeration-like objects natively in PHP, offering a structured and type-safe way to work with predefined constant values.

## Example

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
Value '13' is not part of the enum Month
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
