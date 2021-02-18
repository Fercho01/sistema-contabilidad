<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libromayor extends Model
{
    protected $table = 'librosmayores';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre', 'descripcion', 'librodiario_id','empresaId' ];
    protected $timestamp = true;
    // RELACIONES
    public function librodiario()
    {
        return $this->belongsTo(Librodiario::class, 'librodiario_id');
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresaId');
    }
}
