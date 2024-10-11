<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class BadMailSuppressor extends Suppressor
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;

        parent::__construct();
    }

    public function getName(): string
    {
        return 'Bad Mail Suppressor: ' . $this->filename;
    }


    public function process(): array
    {
        $file = fopen(DIR . "/data/" . $this->filename . ".txt", "r+");

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
            ->where('email', $data)
            ->exists();
    }
}
