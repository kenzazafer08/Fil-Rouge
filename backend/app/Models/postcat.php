<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postcat extends Model
{
    use HasFactory;
    protected $table = 'postcats';
    protected $fillable = [
        'name',
        'discription',
        'image',
    ];
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(posts::class);
    }
}
