<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Libromayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibromayorController extends Controller
{
    public function index()
    {
        return view('librosmayores.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'librodiario_id' => 'required'
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $libromayor = Libromayor::create($request->all());
        $libromayor->save();
        $bitacora = Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró el Libro Mayor: $libromayor->nombre",
            'empresaId' => Auth::user()->empresaId,
        ]);
        $bitacora->save();
        return redirect()->back()->with('info','Creado con éxito');
    }

    public function registrar()
    {
        return view('librosmayores.crear');
    }

    public function update(Request $request, $id)
    {
        $libromayor = Libromayor::findOrFail($id);
        $nombre = $libromayor->nombre;
        $libromayor->update($request->all());
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Actualizó el Libro Mayor: $nombre"
        ]);
        return redirect()->back()->with('act','Actualizado con éxito');
    }

    public function delete($id)
    {
        $libromayor = Libromayor::findOrFail($id);
        $libromayor->estado = 1;
        $libromayor->update();
        $bitacora = Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el Libro Mayor: $libromayor->nombre"
        ]);
        $bitacora->save();
        return redirect()->back()->with('delete','Eliminado con éxito');
    }
}
