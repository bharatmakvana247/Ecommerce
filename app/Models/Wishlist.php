<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'user_id',
        'price',
    ];

    public function product_list()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');}

}
