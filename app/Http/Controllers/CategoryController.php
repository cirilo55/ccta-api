<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return response()->json([
            'categories' => $categories,
            'message' => 'Categorias recuperado com sucesso!'
        ], 200);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        if ($category) {
            return response()->json([
                'categories' => $category,
                'message' => 'Categoria recuperado com sucesso!'
            ], 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
