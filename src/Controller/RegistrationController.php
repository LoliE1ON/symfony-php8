<?php

namespace App\Controller;

use App\Service\User\UserManagerService;
use App\Value\CreateUserValue;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class RegistrationController extends AbstractRestController
{
    public const ROUTE = 'api.registration';

    public function __construct(
        private UserManagerService $manager,
        private ValidatorInterface $validator,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $createUserValue = new CreateUserValue(
            $request->get('name'),
            $request->get('email')
        );

        $user = $this->manager->create($createUserValue);

        return $this->respond($user)->setStatusCode(Response::HTTP_CREATED);
    }
}