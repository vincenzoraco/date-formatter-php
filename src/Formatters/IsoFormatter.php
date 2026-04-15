<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class IsoFormatter extends DateFormatterAbstract
{
    protected string $key = 'iso';

    public function __toString(): string
    {
        return (string) $this->getDate()->toIsoString();
    }
}
