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
        return response()->json([
            'users' => $users,
            'message' => 'Usuários recuperados com sucesso!'
        ], 200);
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->create($request);
        return response()->json([
            'user' => $user,
            'message' => 'Usuário criado com sucesso!'
        ], 200);
    }

    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return response()->json([
            'user' => $user,
            'message' => 'Usuário recuperado com sucesso!'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->getById($id);
        if($user === null){
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $user = $this->userRepository->update($id, $request);
        return response()->json([
            'user' => $user,
            'message' => "Usuário {$user->name} atualizado com sucesso!"
        ], 200);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->getById($id);
        if($user === null){
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $this->userRepository->delete($id);
        return response()->json(['message' => "Usuário {$user->name} deletado com sucesso!"], 200);
    }

    public function getProductsByUser($id)
    {

        $products = $this->userService->listProductsByUser($id);
        if($products->isEmpty()){
            return response()->json(['message' => 'Nenhum produto encontrado para este usuário'], 404);
        }
        return response()->json([
            'products' => $products,
            'message' => 'Produtos recuperados com sucesso!'
        ], 200);
    }
}
