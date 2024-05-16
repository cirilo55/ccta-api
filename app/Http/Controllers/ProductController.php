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
        return $products;
    }

    public function create(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        if ($product) {
            return response()->json($product, 201);
        } else {
            return response()->json(['error' => 'Failed to create product'], 400);
        }
    }

    public function store(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        if ($product) {
            return response()->json($product, 201);
        } else {
            return response()->json(['error' => 'Failed to store product'], 400);
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = $this->productRepository->update($id, $request);
        if ($product) {
            return response()->json($product, 200);
        } else {
            return response()->json(['error' => 'Failed to update product'], 400);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->productRepository->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Product deleted'], 200);
        } else {
            return response()->json(['error' => 'Product not found or delete failed'], 400);
        }
    }
}
