<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Produto;

class ItemPedido extends Model
{
    protected $fillable = ['quantidade', 'produto_id', 'pedido_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }


    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
