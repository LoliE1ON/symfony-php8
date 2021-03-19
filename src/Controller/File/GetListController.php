<?php

namespace App\Controller\File;

use App\Controller\User\AbstractUserController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetListController extends AbstractUserController
{
    public const ROUTE = 'api.file.list';

    public function __invoke(string $id): JsonResponse
    {
        // TODO: Implement login
        $user = $this->findUser($id);

        return $this->respond(
            $user->getFiles()
        );
    }
}