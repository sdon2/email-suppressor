<?php

namespace Saravana\EmailSuppressor\Business;

abstract class Suppressor implements ISuppressor
{
    protected static $count;
    protected static $suppressedCount;

    public function __construct()
    {
        static::$count = 0;
        static::$suppressedCount = 0;
    }

    public function getCount(): int
    {
        return static::$count;
    }

    public function getSuppressedCount(): int
    {
        return static::$suppressedCount;
    }

    public function getResult(): array
    {
        return [
            'name' => $this->getName(),
            'count' => static::$count,
            'suppressed' => static::$suppressedCount
        ];
    }

    public abstract function getName(): string;

    public abstract function process(): array;

    protected abstract function suppress(string $data): bool;
}
