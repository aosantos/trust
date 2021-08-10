<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosCompras extends Model
{

    protected $table = 'pedidos_compra';

    protected $fillable = [
        'client_id', 'produto_id', 'valor_total'
    ];
    public $timestamps = false;


    public function produtos()
    {
        return $this->belongsTo(Produtos::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

}
