# PHP Enum Package

## Description
This package provides enum support for PHP, allowing for easy management and usage of enumerations.

## Installation
You can install the package via Composer:

```bash
composer require wowpack/php-enum
```

## Usage
To use the package, implement the `Enumerable` interface in your enum classes. Here is an example:

```php
use Wowpack\Enumeration\Enumerable;
use Wowpack\Enumeration\InteractsWithEnum;

enum MyEnum implements Enumerable
{
    use InteractsWithEnum;
    // Implement the required methods...
}
```

## License
This package is licensed under the MIT License.
