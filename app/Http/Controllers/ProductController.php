<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAllWithRelations(['category']);
        return response()->json([
            'products' => $products,
            'message' => 'Produtos recuperados com sucesso!'
        ], 200);
    }

    public function create(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'Produto criado com sucesso!'
            ], 201);
        } else {
            return response()->json(['error' => 'Falha ao criar o produto'], 400);
        }
    }

    public function store(Request $request)
    {
        $product = $this->productRepository->store($request->all());
        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'Produto armazenado com sucesso!'
            ], 201);
        } else {
            return response()->json(['error' => 'Falha ao armazenar o produto'], 400);
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'Produto recuperado com sucesso!'
            ], 200);
        } else {
            return response()->json(['error' => 'Produto não encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = $this->productRepository->updateProductCategory($id, $request);
        if ($product) {
            return response()->json([
                'product' => $product,
                'message' => 'Produto atualizado com sucesso!'
            ], 200);
        } else {
            return response()->json(['error' => 'Falha ao atualizar o produto'], 400);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->productRepository->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Produto deletado com sucesso!'], 200);
        } else {
            return response()->json(['error' => 'Produto não encontrado ou falha ao deletar'], 400);
        }
    }
}
