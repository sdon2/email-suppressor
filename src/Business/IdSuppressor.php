<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class IdSuppressor implements ISuppressor
{
    public static function suppress(string $data): bool
    {
        return Manager::table('data')
            ->whereRaw('MD5(email) = ?', [$data])
            ->exists();
    }
}
