<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    protected $table = 'products';
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'discription','stock','id_categorie','id_pet','image','price'];    
    public function pcategorie()
    {
        return $this->belongsTo(pcategorie::class,'id_categorie');
    }
    public function pet()
    {
        return $this->belongsTo(pet::class,'id_pet');
    }
    public function review()
    {
        return $this->hasMany(review::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function order()
    {
        return $this->hasMany(order_line::class);
    }
}
