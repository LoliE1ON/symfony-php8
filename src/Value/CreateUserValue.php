<?php

namespace App\Value;

class CreateUserValue
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}
}