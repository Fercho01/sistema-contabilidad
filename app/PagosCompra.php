<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosCompra extends Model
{
    protected $table = 'pagos_compras';
    protected $primaryKey = 'id';
    protected $fillable = [ 'monto','facturaCompra_id','empresaId' ];
    protected $timestamp = true;
    // Relación con factura Compra
    public function facturaCompra()
    {
        return $this->belongsTo(FacturaCompra::class,'facturaCompra_id');
    }
    // Relación con empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresaId');
    }

}
