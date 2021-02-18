<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\FacturaVenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class FacturaVentaController extends Controller
{
    public function index()
    {
        return view('facturaventa.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'monto' => 'required',
            'asiento_id' => 'required'
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $facturaventa = FacturaVenta::create($request->all());
        $facturaventa->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró una nueva factura de venta: $facturaventa->id",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('facturaventa.crear');
    }

    // public function update(Request $request, $id)
    // {
    //     FacturaVenta::where('id', $id)->update($request->all());
    //     return redirect()->back()->with('act','Actualizado con éxito');
    // }
    public function imprimir($id){
        $facturaventa = FacturaVenta::findOrFail($id);
        $facturaventa->load('pedidoVenta');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('facturaventa.pdf', compact('facturaventa'));
        return $pdf->stream('invoice.pdf');
    }

    public function delete($id)
    {
        $facturaventa = FacturaVenta::findOrFail($id);
        $facturaventa->estado = 1;
        $facturaventa->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó la factura de venta: $facturaventa->id"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
