<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc850Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_850';

    public function __toString(): string
    {
        return $this->getDate()->toRfc850String();
    }
}
