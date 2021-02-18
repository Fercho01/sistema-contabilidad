<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table='proveedores';
    protected $primaryKey='id';
    protected $fillable=['nombre','estado','empresa','ci','empresaId'];
    protected $timestamp = true;
    // Relación con pedido Compra
    public function pedidoCompra(){
        return $this->hasMany(Empresa::class, 'id_proveedor');
    }

}
