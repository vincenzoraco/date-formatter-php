<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class DateTimeFormatter extends DateFormatterAbstract
{
    protected string $key = 'datetime';

    public function __toString(): string
    {
        return $this->getDate()->toDateTimeString();
    }
}
