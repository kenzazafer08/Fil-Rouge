<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcategorie extends Model
{
    protected $table = 'pcategories';
    protected $fillable = [
        'name',
        'discription',
        'image',
    ];
    use HasFactory;
    public function products()
    {
        return $this->hasMany(pcategorie::class);
    }
}
