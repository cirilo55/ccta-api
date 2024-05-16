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


    public function store(Request $request)
    {
        $category = $this->categoryRepository->create($request);
        return $category;
    }


    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        return $category;
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryRepository->update($id, $request);
        return $category;
    }

    public function destroy($id)
    {
        $user = $this->categoryRepository->delete($id);
        return $user;
    }
}
