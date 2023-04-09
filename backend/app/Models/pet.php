<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    use HasFactory;
    protected $table = 'pets';
    protected $fillable = [
        'name',
        'discription',
        'image',
    ];
    use HasFactory;
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
