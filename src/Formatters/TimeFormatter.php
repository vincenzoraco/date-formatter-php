<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class TimeFormatter extends DateFormatterAbstract
{
    protected string $key = 'time';

    public function __toString(): string
    {
        return $this->getDate()->toTimeString();
    }
}
