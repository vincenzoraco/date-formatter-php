<?php

declare(strict_types=1);

namespace VincenzoRaco;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use DateTime;
use DateTimeImmutable;

class FormatDate
{
    private CarbonImmutable $date;

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

    public function toArray(): array
    {
        return array_reduce(
            $this->formatters,
            function (array $formatters, DateFormatterAbstract $formatter) {
                $formatter->setDate($this->date);

                $formatters[$formatter->getKey()] = (string) $formatter;

                return $formatters;
            },
            [],
        );
    }
}
