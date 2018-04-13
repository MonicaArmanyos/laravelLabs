<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        //User::class == 'App\User'
        return $this->belongsTo(User::class);
    }
    
}
