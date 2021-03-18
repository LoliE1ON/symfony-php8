<?php

namespace App\Exception\User;

use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserNotFoundException extends NotFoundHttpException
{
    #[Pure] public static function for(string $id): static
    {
        return new static(
            sprintf('User %s not found', $id)
        );
    }
}