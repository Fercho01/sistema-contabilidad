<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'ci', 'nombre', 'direccion','empresaId' ];
    protected $timestamp = true;
    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresaId');
    }

    // Relación con pedido venta
    public function pedidoVenta()
    {
        return $this->hasMany(PedidoVenta::class,'cliente_id');
    }
}
