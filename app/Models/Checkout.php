<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use SoftDeletes;
    protected $table = 'checkouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'cart_id',
        'user_id',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'status',
    ];

    public function checkout_list()
    {
        return $this->hasMany(Cart::class, 'id', 'cart_id');
    }
}
