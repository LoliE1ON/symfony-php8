<?php

namespace App\Controller\User;

use Symfony\Component\HttpFoundation\JsonResponse;

final class GetUserController extends AbstractUserController
{
    public const ROUTE = 'api.user.get';

    public function __invoke(string $id): JsonResponse
    {
        $user = $this->findUser($id);

        return $this->respond($user);
    }
}