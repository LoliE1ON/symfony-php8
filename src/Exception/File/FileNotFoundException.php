<?php

namespace App\Exception\File;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class FileNotFoundException extends NotFoundHttpException
{
    public static function for(string $id): self
    {
        return new self(
            sprintf('File %s not found', $id)
        );
    }
}