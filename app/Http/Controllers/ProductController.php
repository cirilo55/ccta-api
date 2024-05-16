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
        $products = $this->productRepository->getAllWithRelations(['user']);
        return $products;
    }

    public function create(Request $request)
    {
        $product = $this->productRepository->getById($request);
        return $product;
    }

    public function store(Request $request)
    {
        $product = $this->productRepository->create($request);
        return $product;
    }

    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = $this->productRepository->update($id, $request);
        return $product;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->delete($id);
        return $product;
    }
}
