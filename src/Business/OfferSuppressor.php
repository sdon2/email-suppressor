<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class OfferSuppressor extends Suppressor
{
    public function getName(): string
    {
        return 'Offer Suppressor';
    }

    public function process(): array
    {
        $file = fopen(DIR . "/data/316suppression.txt", "r+");

        while ($line = trim(fgets($file))) {
            if ($this->suppress($line)) {
                static::$suppressedCount++;
            }
        }

        return $this->getResult();
    }

    protected function suppress(string $data): bool
    {
        static::$count++;

        return Manager::table('data')
            ->whereRaw('MD5(email) = ?', [$data])
            ->exists();
    }
}
