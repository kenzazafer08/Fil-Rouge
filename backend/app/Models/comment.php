<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'comments';
    protected $fillable = ['user_id','post_id','comment']; 
    public function post()
    {
        return $this->belongsTo(post::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
