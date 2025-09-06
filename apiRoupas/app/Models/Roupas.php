<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roupas extends Model
{
    protected $fillable = [
        'nome',
        'tipo',
        'preco',
        'quantidade',
    ];
}
