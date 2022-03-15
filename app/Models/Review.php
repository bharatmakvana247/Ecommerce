<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    // use HasFactory;
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'product_id',
        'review',
    ];

    public function user_detail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
