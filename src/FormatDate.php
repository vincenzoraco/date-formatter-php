<?php

declare(strict_types=1);

namespace VincenzoRaco;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTime;
use DateTimeImmutable;

class FormatDate
{
    private readonly CarbonImmutable $date;

    /**
     * @var DateFormatterInterface[]
     */
    private array $formatters = [];

    public function __construct(
        DateTime|DateTimeImmutable|Carbon|CarbonImmutable $date
    ) {
        $this->date = CarbonImmutable::parse($date);
    }

    public function add(
        DateFormatterInterface $formatter,
    ): static {
        $this->formatters[$formatter->getKey()] ??= $formatter;

        return $this;
    }

    public function remove(string $key): static
    {
        unset($this->formatters[$key]);

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return array_reduce(
            $this->formatters,
            function (array $formatters, DateFormatterInterface $formatter) {
                $formatter->setDate($this->date);

                $formatters[$formatter->getKey()] = (string) $formatter;

                return $formatters;
            },
            [],
        );
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
