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
        // Se user_id não for um array, converta-o em um
        $user_ids = isset($data['user_id']) ? (array) $data['user_id'] : [];

        // Remova user_id do array de dados antes de criar o produto
        unset($data['user_id']);

        // Crie o produto
        $product = $this->model->create($data);

        // Se categoryName estiver definido, crie a categoria
        if(isset($data['categoryName'])){
            $category = Category::create([
                "name" => $data['categoryName'],
                "ProductId" => $product->id
            ]);
            $product->load('category');
        }

        // Anexe os usuários ao produto
        if(!empty($user_ids)){
            $product->user()->sync($user_ids);
            $product->load('user');
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
