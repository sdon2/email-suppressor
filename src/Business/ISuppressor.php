<?php

namespace Saravana\EmailSuppressor\Business;

interface ISuppressor
{
    public static function getName(): string;
    public static function getCount(): int;
    public static function getSuppressedCount(): int;
    public static function process(): array;
}