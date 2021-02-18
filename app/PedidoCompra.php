<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoCompra extends Model
{
    protected $table='pedido_compra';
    protected $primaryKey='id';
    protected $fillable=['descripcion','empresaId','id_proveedor'];
    protected $timestamp = true;

    // Relación con empresa
    public function empresa(){
        return $this->belongsTo(Empresa::class,'empresaId');
    }

    // Relación con proveedores
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'id_proveedor');
    }

    // Relación con factura compra
    public function facturaCompra()
    {
        return $this->hasOne(FacturaCompra::class,'pedidoCompra_id');
    }
}
