<?php

namespace App\Handler\User;

use App\Entity\User;
use App\Handler\RestHandler;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class UserHandler extends RestHandler
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function findUser(string $id): User
    {
        $user = $this->repository->find($id);

        if (!$user instanceof User) {
            throw $this->createNotFoundException();
        }

        return $user;
    }
}