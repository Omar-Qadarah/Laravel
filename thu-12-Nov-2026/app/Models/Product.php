<?php

namespace App\Models;

use App\Models\Catigore;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'seller_id',
        'name',
        'description',
        'image',
        'quantity',
        'price',
    ];
    public function catigore()
    {
        return $this->belongsTo(Catigore::class, 'cat_id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function orderitems()
    {
        return $this->hasMany(Orderitem::class);
    }
}
