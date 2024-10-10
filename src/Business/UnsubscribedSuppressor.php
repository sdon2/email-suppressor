<?php

namespace Saravana\EmailSuppressor\Business;

class UnsubscribedSuppressor implements ISuppressor
{
    public static function suppress(string $data): bool
    {
        return false;
    }
}
