<?php

namespace App\Exception\User;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class UserNotFoundException extends NotFoundHttpException
{
    public static function for(string $id): self
    {
        return new self(
            sprintf('User %s not found', $id)
        );
    }
}