<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lojas extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email'];

    public function produtos()
    {
        return $this->hasMany(Produtos::class, 'loja_id', 'id');
    }
}