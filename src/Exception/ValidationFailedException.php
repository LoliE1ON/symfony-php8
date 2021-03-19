<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

final class ValidationFailedException extends BadRequestException
{
    public static function forErrors(mixed $errors): self
    {
        return new self($errors);
    }
}