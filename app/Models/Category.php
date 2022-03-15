<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_name',
    ];
    // public function product_list()
    // {
    //     return $this->belongsTo(Product::class, 'id', 'category_name');
    // }

    public function product_list()
    {
        return $this->hasMany(Product::class, 'category_name', 'id');
    }
}
