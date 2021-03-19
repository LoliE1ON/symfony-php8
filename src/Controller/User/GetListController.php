<?php

namespace App\Controller\User;

use App\Controller\AbstractRestController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetListController extends AbstractRestController
{
    public const ROUTE = 'api.user.list';

    public function __construct(
        private UserRepository $repository
    ) {}

    public function __invoke(): JsonResponse
    {
        $users = $this->repository->findAll();

        return $this->respond($users);
    }
}