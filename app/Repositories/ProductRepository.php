<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getRules($id = null)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];

        return $rules;
    }
}
