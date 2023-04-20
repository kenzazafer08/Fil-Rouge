<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['user_id','total','status']; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_line()
    {
        return $this->hasMany(order_line::class);
    }
}
