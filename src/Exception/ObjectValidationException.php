<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

final class ObjectValidationException extends BadRequestException
{
    public static function forContext(mixed $errors): self
    {
        return new self($errors);
    }
}