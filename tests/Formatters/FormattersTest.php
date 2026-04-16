<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;
use VincenzoRaco\FormatDate;
use VincenzoRaco\Formatters\CookieFormatter;
use VincenzoRaco\Formatters\DateFormatter;
use VincenzoRaco\Formatters\DateTimeFormatter;
use VincenzoRaco\Formatters\DateTimeLocalFormatter;
use VincenzoRaco\Formatters\DayDateTimeFormatter;
use VincenzoRaco\Formatters\FormattedDateFormatter;
use VincenzoRaco\Formatters\FormattedDayDateFormatter;
use VincenzoRaco\Formatters\Iso8601Formatter;
use VincenzoRaco\Formatters\IsoFormatter;
use VincenzoRaco\Formatters\Rfc1036Formatter;
use VincenzoRaco\Formatters\Rfc1123Formatter;
use VincenzoRaco\Formatters\Rfc2822Formatter;
use VincenzoRaco\Formatters\Rfc3339Formatter;
use VincenzoRaco\Formatters\Rfc7231Formatter;
use VincenzoRaco\Formatters\Rfc822Formatter;
use VincenzoRaco\Formatters\Rfc850Formatter;
use VincenzoRaco\Formatters\TimeFormatter;
use VincenzoRaco\Formatters\TimestampFormatter;

$date = CarbonImmutable::parse('2025-03-02 09:25:01', 'UTC');

it('formats date string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new DateFormatter)->toArray();

    expect($result['date'])->toBe('2025-03-02');
});

it('formats datetime string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new DateTimeFormatter)->toArray();

    expect($result['datetime'])->toBe('2025-03-02 09:25:01');
});

it('formats ISO 8601 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Iso8601Formatter)->toArray();

    expect($result['iso_8601'])->toBe('2025-03-02T09:25:01+00:00');
});

it('formats ISO string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new IsoFormatter)->toArray();

    expect($result['iso'])->toContain('2025-03-02');
});

it('formats RFC 822 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc822Formatter)->toArray();

    expect($result['rfc_822'])->toBe('Sun, 02 Mar 25 09:25:01 +0000');
});

it('formats RFC 850 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc850Formatter)->toArray();

    expect($result['rfc_850'])->toBe('Sunday, 02-Mar-25 09:25:01 UTC');
});

it('formats RFC 1036 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc1036Formatter)->toArray();

    expect($result['rfc_1036'])->toBe('Sun, 02 Mar 25 09:25:01 +0000');
});

it('formats RFC 1123 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc1123Formatter)->toArray();

    expect($result['rfc_1123'])->toBe('Sun, 02 Mar 2025 09:25:01 +0000');
});

it('formats RFC 2822 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc2822Formatter)->toArray();

    expect($result['rfc_2822'])->toBe('Sun, 02 Mar 2025 09:25:01 +0000');
});

it('formats RFC 3339 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc3339Formatter)->toArray();

    expect($result['rfc_3339'])->toBe('2025-03-02T09:25:01+00:00');
});

it('formats RFC 7231 string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new Rfc7231Formatter)->toArray();

    expect($result['rfc_7231'])->toBe('Sun, 02 Mar 2025 09:25:01 GMT');
});

it('formats time string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new TimeFormatter)->toArray();

    expect($result['time'])->toBe('09:25:01');
});

it('formats cookie string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new CookieFormatter)->toArray();

    expect($result['cookie'])->toBe('Sunday, 02-Mar-2025 09:25:01 UTC');
});

it('formats datetime local string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new DateTimeLocalFormatter)->toArray();

    expect($result['datetime_local'])->toBe('2025-03-02T09:25:01');
});

it('formats formatted date string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new FormattedDateFormatter)->toArray();

    expect($result['formatted_date'])->toBe('Mar 2, 2025');
});

it('formats formatted day date string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new FormattedDayDateFormatter)->toArray();

    expect($result['formatted_day_date'])->toBe('Sun, Mar 2, 2025');
});

it('formats day datetime string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new DayDateTimeFormatter)->toArray();

    expect($result['day_datetime'])->toBe('Sun, Mar 2, 2025 9:25 AM');
});

it('formats timestamp string', function () use ($date): void {
    $result = (new FormatDate($date))->add(new TimestampFormatter)->toArray();

    expect($result['timestamp'])->toBe('1740907501')
        ->and($result['timestamp'])->toBeString();
});

it('returns correct default key for each formatter', function (): void {
    expect((new DateFormatter)->getKey())->toBe('date')
        ->and((new DateTimeFormatter)->getKey())->toBe('datetime')
        ->and((new Iso8601Formatter)->getKey())->toBe('iso_8601')
        ->and((new IsoFormatter)->getKey())->toBe('iso')
        ->and((new Rfc822Formatter)->getKey())->toBe('rfc_822')
        ->and((new Rfc850Formatter)->getKey())->toBe('rfc_850')
        ->and((new Rfc1036Formatter)->getKey())->toBe('rfc_1036')
        ->and((new Rfc1123Formatter)->getKey())->toBe('rfc_1123')
        ->and((new Rfc2822Formatter)->getKey())->toBe('rfc_2822')
        ->and((new Rfc3339Formatter)->getKey())->toBe('rfc_3339')
        ->and((new Rfc7231Formatter)->getKey())->toBe('rfc_7231')
        ->and((new TimestampFormatter)->getKey())->toBe('timestamp')
        ->and((new TimeFormatter)->getKey())->toBe('time')
        ->and((new CookieFormatter)->getKey())->toBe('cookie')
        ->and((new DateTimeLocalFormatter)->getKey())->toBe('datetime_local')
        ->and((new FormattedDateFormatter)->getKey())->toBe('formatted_date')
        ->and((new FormattedDayDateFormatter)->getKey())->toBe('formatted_day_date')
        ->and((new DayDateTimeFormatter)->getKey())->toBe('day_datetime');
});
