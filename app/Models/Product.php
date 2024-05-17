<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'user_id',
        'categoryName'
    ];
    protected $hidden = ['pivot' , 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }


    public function category()
    {
        return $this->hasOne(Category::class);
    }

    //Mapeamento de dados
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
    }
}
