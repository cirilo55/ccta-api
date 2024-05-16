<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllWithRelations(['products.categories']);
        return $users;
    }

    public function create(Request $request)
    {
        $users = $this->userRepository->getById($request);
        return $users;
    }

    public function store(Request $request)
    {
        $users = $this->userRepository->create($request);
        return $users;
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->update($id, $request);
        return $user;
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return response()->json(null, 204);
    }
}
