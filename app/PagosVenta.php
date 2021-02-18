<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosVenta extends Model
{
    protected $table = 'pago_ventas';
    protected $primaryKey = 'id';
    protected $fillable = [ 'monto','facturaVenta_id','empresaId' ];
    protected $timestamp = true;
    // Relación con factura Venta
    public function facturaVenta()
    {
        return $this->belongsTo(FacturaVenta::class,'facturaVenta_id');
    }
    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresaId');
    }
}
