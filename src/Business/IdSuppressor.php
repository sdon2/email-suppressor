<?php

namespace Saravana\EmailSuppressor\Business;

use Illuminate\Database\Capsule\Manager;

class IdSuppressor implements ISuppressor
{
    public static function suppress(string $data): bool
    {
        return Manager::table('data')->selectRaw('MD5(email) AS email')
            ->get(['email'])
            ->where('email', '=', $data)
            ->count() > 0;
    }
}
