<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class DayDateTimeFormatter extends DateFormatterAbstract
{
    protected string $key = 'day_datetime';

    public function __toString(): string
    {
        return $this->getDate()->toDayDateTimeString();
    }
}
