<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MComment extends Model
{
    protected $table    = 'comments';
    protected $fillable = [
        'id','user_id', 'text','id_update'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userUpdate()
    {
        return $this->belongsTo(Update::class);
    }
}
