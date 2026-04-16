<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class Rfc7231Formatter extends DateFormatterAbstract
{
    protected string $key = 'rfc_7231';

    public function __toString(): string
    {
        return $this->getDate()->toRfc7231String();
    }
}
