<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;
    protected $table = 'chats';

    protected $primaryKey = 'id';

    protected $fillable = [
        'send_id',
        'recevice_id',
        'message',
    ];
    public function userInfoFrom()
    {
        return $this->hasOne('App\Models\User', 'id', 'recevice_id');
    }

}
