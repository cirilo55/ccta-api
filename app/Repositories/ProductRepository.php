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

    public function getRelationsManytoMany()
    {
    return $this->relationsManyToMany;
    }

    protected $relationsManyToMany = ['user'];

    public function store(array $data)
    {
        $user_ids = isset($data['user_id']) ? (array) $data['user_id'] : [];

        unset($data['user_id']);

        $product = $this->model->create($data);

        if(isset($data['categoryName'])){
            $category = Category::create([
                "name" => $data['categoryName'],
                "ProductId" => $product->id
            ]);
            $product->load('category');
        }

        if(!empty($user_ids)){
            $product->user()->sync($user_ids);
            $product->load('user');
        }

        return $product;
    }

    public function updateProductCategory($id, $data)
    {
        $product = Product::find($id);
        $categoryId = $product->category->id;

        if (!$product) {
            return null; // or throw an exception, depending on your error handling
        }

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);

        if (isset($data['nameCategory'])) {
            if($categoryId){
                $category = Category::find($categoryId);
                $category->update([
                    'name' => $data['nameCategory']
                ]);
            }else{
                $category = Category::create([
                    'name' => $data['nameCategory'],
                    'ProductId' => $product->id
                ]);
            }
            $product->load('category');
        }

        if (!empty($data['user_id'])) {
            $product->user()->sync($data['user_id']);
            $product->load('user');
        }

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
