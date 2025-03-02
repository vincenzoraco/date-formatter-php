<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class IsoFormatter extends DateFormatterAbstract
{
    protected string $key = 'iso';

    public function __toString(): string
    {
        return $this->getDate()->toIsoString();
    }
}
