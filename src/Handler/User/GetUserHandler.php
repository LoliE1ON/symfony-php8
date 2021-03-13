<?php

namespace App\Handler\User;

use Symfony\Component\HttpFoundation\JsonResponse;

final class GetUserHandler extends UserHandler
{
    public const ROUTE = 'api.user.get';

    public function __invoke(string $id): JsonResponse
    {
        $user = $this->findUser($id);

        return $this->respond($user);
    }
}