<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class DateFormatter extends DateFormatterAbstract
{
    protected string $key = 'date';

    public function __toString(): string
    {
        return $this->getDate()->toDateString();
    }
}
