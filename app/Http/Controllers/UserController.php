<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userRepository->getAllWithRelations(['products.category']);
        return response()->json($users, 200);
    }

    public function create(Request $request)
    {
        $user = $this->userRepository->getById($request->id);
        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->create($request);
        return response()->json($user, 200);
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->update($id, $request);
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }

    public function getProductsByUser($id)
    {
        $products = $this->userService->listProductsByUser($id);
        return response()->json($products, 200);
    }

}
