<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listProductsByUser($userId)
    {
        return $this->userRepository->getById($userId)->products;
    }


}
