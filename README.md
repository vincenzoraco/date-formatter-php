This package provides a utility to generate an array with different date formats

> **Requires [PHP 8.3+](https://php.net/releases/)**

⚡️ Install the package using [Composer](https://getcomposer.org):

```bash
composer require vincenzoraco/date-formatter-php
```

## Features
- Easily format dates in various formats.
- Out-of-the-box formatters available (see the `/src/Formatters` folder).
- Option to create and use custom formatters by extending `DateFormatterAbstract` or implementing the `DateFormatterInterface`.

## Usage

The `FormatDate` class accepts a `DateTime|DateTimeImmutable|Carbon|CarbonImmutable` object and allows you to add multiple formatters. Here's an example of how to use it: 

```php
(new FormatDate(CarbonImmutable::now()))
  ->add(new Rfc822Formatter)
  ->add(new Rfc850Formatter)
  ->add(new Iso8601Formatter)
  ->add((new TimestampFormatter)->setKey("unix"))
  ->toArray();

// Result
[
    "rfc_822" => "Sun, 02 Mar 25 09:25:01 +0000",
    "rfc_850" => "Sunday, 02-Mar-25 09:25:01 UTC",
    "iso_8601" => "2025-03-02T09:25:01+00:00",
    "unix" => "1740907501",
]
```

## Custom Formatters

To add a custom formatter, you can either extend the abstract class DateFormatterAbstract, which includes several helper methods, or implement the DateFormatterInterface directly.

Example of a custom formatter:

```php
use VincenzoRaco\DateFormatterAbstract;

class CustomFormatter extends DateFormatterAbstract
{
    protected string $key = 'custom_key';

    public function __toString(): string
    {
        return $this->getDate()->format('d/m/Y');
    }
}
```

## License
This package was created by **[Vincenzo Raco](https://github.com/vincenzoraco)** and is licensed under the **[MIT License](https://opensource.org/licenses/MIT)**.
