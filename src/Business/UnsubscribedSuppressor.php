<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class UnsubscribedSuppressor implements ISuppressor
{
    private static $count = 0;
    private static $suppressedCount = 0;

    public static function getCount(): int {
        return self::$count;
    }

    public static function process(): array {
        $file = fopen(DIR . "/data/unsubscribe.txt", "r+");

        while ($line = trim(fgets($file))) {
            if (self::suppress($line)) {
                self::$suppressedCount++;
            }
        }

        return [
            'name' => self::getName(),
            'count' => self::$count,
            'suppressed' => self::$suppressedCount
        ];
    }

    public static function getName(): string
    {
        return 'Unsubscribed Suppressor';
    }

    public static function getSuppressedCount(): int
    {
        return self::$suppressedCount;
    }

    public static function suppress(string $data): bool
    {
        self::$count++;

        list($emid, $offerid) = explode('|', $data);

        return Manager::table('data')
            ->whereRaw('emid = ?', [$emid])
            ->exists();
    }
}
