<?php

declare(strict_types=1);

namespace VincenzoRaco;

use Carbon\CarbonImmutable;

abstract class DateFormatterAbstract implements DateFormatterInterface
{
    protected string $key;

    private CarbonImmutable $date;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(
        string $key,
    ): static {
        $this->key = $key;

        return $this;
    }

    public function setDate(
        CarbonImmutable $date,
    ): static {
        $this->date = $date;

        return $this;
    }

    public function getDate(): CarbonImmutable
    {
        return $this->date;
    }
}
