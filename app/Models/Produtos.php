<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'ativo', 'loja_id'];

    public function getValorAttribute($value)
    {
        return "R$" . number_format($this->attributes['valor'], 2, ',', '.');
    }
}