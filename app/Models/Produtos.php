<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{

    protected $table = 'produtos';

    protected $fillable = [
        'nome_produto', 'preco'
    ];
    public $timestamps = false;



}
