<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class IdSuppressor implements ISuppressor
{
    private static $count = 0;
    private static $suppressedCount = 0;

    public static function process(): array {
        $file = fopen(DIR . "/data/316suppression.txt", "r+");
        
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
        return 'ID Suppressor';
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public static function getSuppressedCount(): int
    {
        return self::$suppressedCount;
    }

    private static function suppress(string $data): bool
    {
        self::$count++;

        return Manager::table('data')
            ->whereRaw('MD5(email) = ?', [$data])
            ->exists();
    }
}
