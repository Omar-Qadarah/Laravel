<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Catigore extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
