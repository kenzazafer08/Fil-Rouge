<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    protected $table = 'products';
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'discription','stock','id_categorie','image','price'];    
    public function pcategorie()
    {
        return $this->belongsTo(pcategorie::class,'id_categorie');
    }
}
