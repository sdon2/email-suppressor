<?php

namespace Saravana\EmailSuppressor\Business;

interface ISuppressor
{
    public static function suppress(string $data): bool;
}