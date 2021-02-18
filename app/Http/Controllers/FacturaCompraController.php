<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\FacturaCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class FacturaCompraController extends Controller
{
    public function index()
    {
        return view('facturacompras.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required',
            'asiento_id' => 'required',
            'pedidoCompra_id' => 'required'
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $facturacompra = FacturaCompra::create($request->all());
        $facturacompra->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró una nueva factura de compra: $facturacompra->id",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('facturacompras.crear');
    }

    // public function update(Request $request, $id)
    // {
    //     FacturaCompra::where('id', $id)->update($request->all());
    //     return redirect()->back()->with('act','Actualizado con éxito');
    // }
    public function imprimir($id){
        $facturacompra = FacturaCompra::findOrFail($id);
        $facturacompra->load('pedidoCompra');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('facturacompras.pdf', compact('facturacompra'));
        return $pdf->stream('invoice.pdf');
    }

    public function delete($id)
    {
        $facturacompra = FacturaCompra::findOrFail($id);
        $facturacompra->estado = 1;
        $facturacompra->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó la factura de compra: $facturacompra->id"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
