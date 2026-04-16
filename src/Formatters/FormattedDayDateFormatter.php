<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class FormattedDayDateFormatter extends DateFormatterAbstract
{
    protected string $key = 'formatted_day_date';

    public function __toString(): string
    {
        return $this->getDate()->toFormattedDayDateString();
    }
}
