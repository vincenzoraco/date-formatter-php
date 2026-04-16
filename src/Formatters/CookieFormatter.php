<?php

declare(strict_types=1);

namespace VincenzoRaco\Formatters;

use VincenzoRaco\DateFormatterAbstract;

class CookieFormatter extends DateFormatterAbstract
{
    protected string $key = 'cookie';

    public function __toString(): string
    {
        return $this->getDate()->toCookieString();
    }
}
