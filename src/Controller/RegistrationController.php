<?php

namespace App\Controller;

use App\Service\User\UserManagerService;
use App\Value\CreateUserValue;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationController extends AbstractRestController
{
    public const ROUTE = 'api.registration';

    public function __construct(
        private UserManagerService $manager
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();

        $createUserDto = new CreateUserValue(
            $data['name'],
            $data['email']
        );

        $user = $this->manager->create($createUserDto);

        return $this->respond($user)->setStatusCode(Response::HTTP_CREATED);
    }
}