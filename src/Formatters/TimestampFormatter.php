<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class TimestampFormatter extends DateFormatterAbstract
{
    protected string $key = 'timestamp';

    public function __toString(): string
    {
        return $this->getDate()->timestamp;
    }
}
