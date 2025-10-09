<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteHotel extends Model
{
    protected $fillable = [
        "nome",
        "endereco",    
        "CPF",
        "telefone",
        "numero_quarto"
    ];
}
