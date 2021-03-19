<?php

namespace App\Controller\User;

use App\Controller\AbstractRestController;
use App\Entity\User;
use App\Exception\User\UserNotFoundException;

abstract class AbstractUserController extends AbstractRestController
{
    protected function findUser(string $id): User
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        if (!$user instanceof User) {
            throw UserNotFoundException::for($id);
        }

        return $user;
    }
}