<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $table = 'carts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'cart_id',
        'product_id',
        'user_id',
        'price',
        'quantity',
        'total',
    ];

    public function product_list()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // public function product_list()
    // {
    //     return ($this->hasMany(Product::class, 'id', 'product_id'));
    // }
}
