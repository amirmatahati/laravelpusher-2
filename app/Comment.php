<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table    = 'comments';
    protected $fillable = [
        'user_id', 'text','id_update'
    ];
    public function users()
    {
        //return $this->belongsTo(User::class);
        return $this->belongsTo('App\User','user_id','id');
    }
    public function userUpdate()
    {
        return $this->belongsTo(Update::class);
    }
}
