<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'Title',
        'text',
        'image',
        'id_cat'
    ];
    use HasFactory;
    public function postcat()
    {
        return $this->belongsTo(postcat::class,'id_cat');
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
}
