<?php

namespace App\Controller\User;

use App\Controller\AbstractRestController;
use App\Entity\User;
use App\Exception\User\UserNotFoundException;
use App\Repository\UserRepository;

abstract class AbstractUserController extends AbstractRestController
{
    public function __construct(
        private UserRepository $repository
    ) {}

    protected function findUser(string $id): User
    {
        $user = $this->repository->find($id);

        if (!$user instanceof User) {
            throw UserNotFoundException::for($id);
        }

        return $user;
    }
}