<?php

namespace Saravana\EmailSuppressor\Business;

interface ISuppressor
{
    public function getName(): string;
    public function getCount(): int;
    public function getSuppressedCount(): int;
    public function process(): array;
}