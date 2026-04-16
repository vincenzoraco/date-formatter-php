<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class FormattedDateFormatter extends DateFormatterAbstract
{
    protected string $key = 'formatted_date';

    public function __toString(): string
    {
        return $this->getDate()->toFormattedDateString();
    }
}
