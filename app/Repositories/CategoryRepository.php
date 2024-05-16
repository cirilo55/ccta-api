<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getRules($id = null)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
        ];

        return $rules;
    }
}
