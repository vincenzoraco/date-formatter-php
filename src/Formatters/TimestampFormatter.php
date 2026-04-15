<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class TimestampFormatter extends DateFormatterAbstract
{
    protected string $key = 'timestamp';

    public function __toString(): string
    {
        return (string) $this->getDate()->timestamp;
    }
}
