<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    // use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name',
        'product_details',
        'product_price',
        'product_image',
        'product_image_gallery',
        'category_name',
        'brand_name',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_name', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_name', 'id');
    }

}
