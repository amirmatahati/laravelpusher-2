<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $table    = 'updates';
    protected $fillable = [
        'id','user_id', 'text'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
