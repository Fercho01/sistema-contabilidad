<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\PagosCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagosCompraController extends Controller
{
    public function index()
    {
        return view('pagocompras.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'monto' => 'required',
            'facturaCompra_id' => 'required'
        ]);
        // dd($request->monto);
        $request['empresaId'] = Auth::user()->empresaId;
        $pagoscompra = PagosCompra::create($request->all());
        $pagoscompra->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró un nuevo pago de compra: $pagoscompra->id",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('pagocompras.crear');
    }

    // public function update(Request $request, $id)
    // {
    //     PagosCompra::where('id', $id)->update($request->all());
    //     return redirect()->back();
    // }

    public function delete($id)
    {
        $pagoscompra = PagosCompra::findOrFail($id);
        $pagoscompra->estado = 1;
        $pagoscompra->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el pago de compra: $pagoscompra->id"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
