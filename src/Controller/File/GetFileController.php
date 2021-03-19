<?php

namespace App\Controller\File;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetFileController extends AbstractFileController
{
    public const ROUTE = 'api.file.get';

    public function __invoke(string $id): JsonResponse
    {
        $file = $this->findFile($id);

        return $this->respond($file);
    }
}