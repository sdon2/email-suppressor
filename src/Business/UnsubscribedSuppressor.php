<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class UnsubscribedSuppressor extends Suppressor
{
    public function getName(): string
    {
        return 'Unsubscribed Suppressor';
    }

    public function process(): array
    {
        $file = fopen(DIR . "/data/unsubscribe.txt", "r+");

        while ($line = trim(fgets($file))) {
            if ($this->suppress($line)) {
                static::$suppressedCount++;
            }
        }

        return $this->getResult();
    }

    public function suppress(string $data): bool
    {
        static::$count++;

        list($emid, $offerid) = explode('|', $data);

        return Manager::table('data')
            ->where('emid', $emid)
            ->exists();
    }
}
