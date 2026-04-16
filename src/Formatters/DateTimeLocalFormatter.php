<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class DateTimeLocalFormatter extends DateFormatterAbstract
{
    protected string $key = 'datetime_local';

    public function __toString(): string
    {
        return $this->getDate()->toDateTimeLocalString();
    }
}
