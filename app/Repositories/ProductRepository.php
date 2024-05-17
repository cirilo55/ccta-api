<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;

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

    public function store(array $data)
    {
        $product = $this->model->create($data);

        if(isset($data['categoryName'])){
            $category = array("name" => $data['categoryName'], "ProductId" => $product->id);
            $category = Category::create($category);
            unset($data['categoryName']);
            $product->load('category');

        }

        return $product;
    }

    public function updateProductCategory($id,$data)
    {

        $product = $this->model->find($id);

        if (isset($data['categoryName'])) {
            $categories = Category::all();

                foreach ($categories as $category) {
                    if ($category->product_id == $product->id) {

                        $category->name = $data['categoryName'];
                        $category->save();
                    }
                }

            unset($data['categoryName']);
        }

        if(!is_array($data)){
            $data = $data->toArray();
        }

        $product->update($data);
        $product->load('category');
        return $product;
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
