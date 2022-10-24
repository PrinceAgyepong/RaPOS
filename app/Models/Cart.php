<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'attendant_id', 'cookie'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
