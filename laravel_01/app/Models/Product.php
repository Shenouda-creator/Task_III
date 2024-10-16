<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table='products';
    protected $fillable = ['title', 'description', 'price'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function orders(){
        $this->$this->belongsToMany(Order::class);
    }
}

