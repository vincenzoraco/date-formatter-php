<?php

declare(strict_types=1);

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use VincenzoRaco\FormatDate;
use VincenzoRaco\Formatters\DateFormatter;
use VincenzoRaco\Formatters\DateTimeFormatter;
use VincenzoRaco\Formatters\TimestampFormatter;

it('accepts DateTime', function (): void {
    $date = new DateTime('2025-03-02 09:00:00');

    $result = (new FormatDate($date))
        ->add(new DateFormatter)
        ->toArray();

    expect($result)->toBe(['date' => '2025-03-02']);
});

it('accepts DateTimeImmutable', function (): void {
    $date = new DateTimeImmutable('2025-03-02 09:00:00');

    $result = (new FormatDate($date))
        ->add(new DateFormatter)
        ->toArray();

    expect($result)->toBe(['date' => '2025-03-02']);
});

it('accepts Carbon', function (): void {
    $date = Carbon::parse('2025-03-02 09:00:00');

    $result = (new FormatDate($date))
        ->add(new DateFormatter)
        ->toArray();

    expect($result)->toBe(['date' => '2025-03-02']);
});

it('accepts CarbonImmutable', function (): void {
    $date = CarbonImmutable::parse('2025-03-02 09:00:00');

    $result = (new FormatDate($date))
        ->add(new DateFormatter)
        ->toArray();

    expect($result)->toBe(['date' => '2025-03-02']);
});

it('returns an empty array when no formatters are added', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02')))
        ->toArray();

    expect($result)->toBe([]);
});

it('supports fluent add calls', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add(new DateFormatter)
        ->add(new DateTimeFormatter)
        ->toArray();

    expect($result)->toBe([
        'date' => '2025-03-02',
        'datetime' => '2025-03-02 09:00:00',
    ]);
});

it('ignores duplicate formatter keys', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add(new DateFormatter)
        ->add(new DateFormatter)
        ->toArray();

    expect($result)->toHaveCount(1);
});

it('allows overriding a formatter key via setKey', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add((new TimestampFormatter)->setKey('unix'))
        ->toArray();

    expect($result)->toHaveKey('unix')
        ->and($result)->not->toHaveKey('timestamp');
});

it('removes a formatter by key', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add(new DateFormatter)
        ->add(new DateTimeFormatter)
        ->remove('date')
        ->toArray();

    expect($result)->toHaveCount(1)
        ->and($result)->toHaveKey('datetime');
});

it('handles removing a non-existent key gracefully', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add(new DateFormatter)
        ->remove('non_existent')
        ->toArray();

    expect($result)->toHaveCount(1);
});

it('returns valid JSON from toJson', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02 09:00:00')))
        ->add(new DateFormatter)
        ->toJson();

    expect($result)->toBeJson()
        ->and(json_decode($result, true))->toBe(['date' => '2025-03-02']);
});

it('returns empty JSON object from toJson with no formatters', function (): void {
    $result = (new FormatDate(new DateTime('2025-03-02')))
        ->toJson();

    expect($result)->toBe('[]');
});
