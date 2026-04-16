<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc3339Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_3339';

    public function __toString(): string
    {
        return $this->getDate()->toRfc3339String();
    }
}
