<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class OptOutSuppressor extends Suppressor
{
    public function getName(): string {
        return 'Opt Out Suppressor';
    }

    public function process(): array {

        $file = fopen(DIR . "/data/optout.txt", "r+");

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