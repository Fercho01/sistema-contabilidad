<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Empresa;
use App\PedidoCompra;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoCompraController extends Controller
{
    public  function  index(){
        return view('pedidoCompras.lista');
    }
    public  function registrar(){
        return view('pedidoCompras.crear');
    }
    // 'id_empresa','id_proveedor'];
    public function create(Request $request){
        $this->validate($request,[
            'descripcion' =>'required',
            'id_proveedor' => 'required',
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $pedidocompra = PedidoCompra::create($request->all());
        $pedidocompra->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró un nuevo pedido de compra: $pedidocompra->descripcion",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function update(Request $request,$id)
    {
        $pedidocompra = PedidoCompra::findOrFail($id);
        $descripcion = $pedidocompra->descripcion;
        $pedidocompra->update($request->all());
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Actualizó el pedido de compra: $descripcion"
        ]);
        return redirect()->back()->with('act','Actualizado con éxito');
    }
    public function delete($id){
        $pedidocompra = PedidoCompra::findOrFail($id);
        $pedidocompra->estado = 1;
        $pedidocompra->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el pedido de compra: $pedidocompra->descripcion ($pedidocompra->id)"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
