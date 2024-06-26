<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    protected $hidden = ['created_at', 'updated_at', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
