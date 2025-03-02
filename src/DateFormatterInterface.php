<?php

namespace VincenzoRaco;

use Carbon\CarbonImmutable;

interface DateFormatterInterface
{
    public function setKey(
        string $key,
    ): static;

    public function getKey(): string;

    public function setDate(
        CarbonImmutable $date,
    ): static;

    public function __toString(): string;
}
