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
        return $categories;
    }

    public function create(Request $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if ($category) {
            return response()->json($category, 201);
        } else {
            return response()->json(['error' => 'Failed to create category'], 400);
        }
    }

    public function store(Request $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if ($category) {
            return response()->json($category, 201);
        } else {
            return response()->json(['error' => 'Failed to store category'], 400);
        }
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        if ($category) {
            return response()->json($category, 200);
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryRepository->update($id, $request->all());
        if ($category) {
            return response()->json($category, 200);
        } else {
            return response()->json(['error' => 'Failed to update category'], 400);
        }
    }

    public function destroy($id)
    {
        $deleted = $this->categoryRepository->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Category deleted'], 200);
        } else {
            return response()->json(['error' => 'Category not found or delete failed'], 400);
        }
    }
}
