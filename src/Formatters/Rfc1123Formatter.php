<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc1123Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_1123';

    public function __toString(): string
    {
        return $this->getDate()->toRfc1123String();
    }
}
