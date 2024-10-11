<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class FBLSuppressor extends Suppressor
{
    public function getName(): string
    {
        return 'FBL Suppressor';
    }

    public function process(): array
    {
        $file = fopen(DIR . "/data/fbl_yahoo_data.txt", "r+");

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

        list($emid, $offerid) = explode('|', $data);

        return Manager::table('data')
            ->where('emid', $emid)
            ->exists();
    }
}
