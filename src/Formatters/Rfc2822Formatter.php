<?php

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc2822Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_2822';

    public function __toString(): string
    {
        return $this->getDate()->toRfc2822String();
    }
}
