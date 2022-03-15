<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'message',
        'status',
    ];
}
