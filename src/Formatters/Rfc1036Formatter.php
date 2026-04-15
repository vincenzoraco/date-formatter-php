<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc1036Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_1036';

    public function __toString(): string
    {
        return $this->getDate()->toRfc1036String();
    }
}
