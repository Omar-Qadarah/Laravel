<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderitems():HasMany
    {
        return $this->hasMany(Orderitem::class);
    }

}
