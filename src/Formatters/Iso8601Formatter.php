<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Iso8601Formatter extends DateFormatterAbstract
{
    protected string $key = 'iso_8601';

    public function __toString(): string
    {
        return $this->getDate()->toIso8601String();
    }
}
