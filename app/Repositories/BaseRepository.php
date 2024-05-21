<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Exception;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllWithRelations(array $relations)
    {
    return $this->model->with($relations)->get();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getByIdWithRelations($id, array $relations)
    {
        return $this->model->with($relations)->find($id);
    }

    public function create($data)
    {
        if(!is_array($data)){
            $data = $data->toArray();
        }

        $rules = $this->getRules();
        if (!empty($rules)) {
            $this->validate($data, $rules);
        }
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        if(!is_array($data)){
            $data = $data->toArray();
        }

        $item = $this->model->find($id);
        if ($item) {
            $rules = $this->getRules($id);
            if (!empty($rules)) {
                $this->validate($data, $rules);
            }
            $item->update($data);
            return $item;
        }
        return null;
    }

    public function delete(int $id)
    {
        $item = $this->model->find($id);
        if ($item) {
            $item->delete();
            return true;
        }
        return false;
    }

    public function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);


        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            throw new HttpResponseException(
                response()->json(['errors' => $errors], 422)
            );
        }
    }

    public function getRules($id = null)
    {
        return [];
    }

    public function attachRelations($model, $relation, $ids)
    {
        if (method_exists($model, $relation)) {
            $model->$relation()->attach($ids);
        } else {
            throw new Exception("Relação {$relation} não existe no modelo " . get_class($model));
        }
    }
}
