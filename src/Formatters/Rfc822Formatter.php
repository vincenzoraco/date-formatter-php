<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc822Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_822';

    public function __toString(): string
    {
        return $this->getDate()->toRfc822String();
    }
}
