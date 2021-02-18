<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table='empresas';
    protected  $primaryKey='id';
    protected  $fillable=[ 'nombre' ];

    // Relación con Pedido Compra
    public function pedidoCompra(){
        return $this->hasMany(Empresa::class, 'empresaId');
    }

    public function librosdiarios()
    {
        return $this->hasMany(Librodiario::class, 'empresaId');
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->hasMany(Cliente::class,'empresaId');
    }
    // Relación con factura venta
    public function facturaVenta()
    {
        return $this->hasMany(FacturaVenta::class,'empresaId');
    }
    // Asiento
    public function asiento(){
        return $this->hasMany(Asiento::class, 'empresaId');
    }
    // factura compra
    public function facturacompra(){
        return $this->hasMany(FacturaCompra::class, 'empresaId');
    }
    // libro mayor
    public function libromayor(){
        return $this->hasMany(Libromayor::class, 'empresaId');
    }
    // pagos compras
    public function pagocompra(){
        return $this->hasMany(PagosCompra::class, 'empresaId');
    }
    // pagos venta
    public function pagoventa(){
        return $this->hasMany(PagosVenta::class, 'empresaId');
    }
    // pagos venta
    public function pedidoventa(){
        return $this->hasMany(PedidoVenta::class, 'empresaId');
    }
}
