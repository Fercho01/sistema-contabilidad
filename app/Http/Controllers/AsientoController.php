<?php

namespace App\Http\Controllers;

use App\Asiento;
use App\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsientoController extends Controller
{

    public function index()
    {
        return view('asiento.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'moneda' => 'required',
            'libroDiario_id' => 'required'
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $asiento = Asiento::create($request->all());
        $asiento->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró un nuevo asiento: $asiento->moneda",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('asiento.crear');
    }

    public function update(Request $request, $id)
    {
        $asiento = Asiento::findOrFail($id);
        $moneda = $asiento->moneda;
        $asiento->update($request->all());
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Editó el asiento: $moneda"
        ]);
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        $asiento = Asiento::findOrFail($id);
        $asiento->estado = 1;
        $asiento->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el asiento: $asiento->moneda"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
