<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{

    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'cpf', 'endereco'
    ];
    public $timestamps = false;

    public function pedidos()
    {
        return $this->hasMany(PedidosCompras::class);
    }


}

