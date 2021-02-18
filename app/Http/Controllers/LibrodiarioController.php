<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Librodiario;
use App\Libromayor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrodiarioController extends Controller
{
    public function index()
    {
        return view('librosdiarios.lista');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $librodiario = Librodiario::create($request->all());
        $librodiario->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró el Libro Diario: $librodiario->nombre",
            'empresaId' => Auth::user()->empresaId,
        ]);
        $libromayor = new Libromayor();
        $libromayor->nombre = "Libro mayor del $librodiario->nombre";
        $libromayor->descripcion = "Este es un libro mayor que pertence a $librodiario->nombre";
        $libromayor->empresaId = Auth::user()->empresaId;
        $libromayor->librodiario_id = $librodiario->id;
        $libromayor->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró el Libro Mayor: $libromayor->nombre",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info', 'Creado con éxito');
    }

    public function registrar()
    {
        return view('librosdiarios.crear');
    }

    public function update(Request $request, $id)
    {
        $librodiario = Librodiario::findOrFail($id);
        $nombre = $librodiario->nombre;
        $librodiario->update($request->all());
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Actualizó el Libro Diario: $nombre"
        ]);
        $libromayor = $librodiario->libromayor;
        $nombre = $libromayor->nombre;
        $libromayor->nombre = "Libro mayor del $librodiario->nombre";
        $libromayor->descripcion = "Este es un libro mayor que pertence a $librodiario->nombre";
        $libromayor->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Actualizó el Libro Mayor: $nombre"
        ]);
        return redirect()->back()->with('act', 'Actualizado con éxito');
    }

    public function delete($id)
    {
        $librodiario = Librodiario::findOrFail($id);
        $libromayor = $librodiario->libromayor;
        $librodiario->estado = 1;
        $librodiario->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el Libro Diario: $librodiario->nombre"
        ]);
        $libromayor->estado = 1;
        $libromayor->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó el Libro Mayor: $libromayor->nombre"
        ]);
        return redirect()->back()->with('delete', 'Eliminado con éxito');
    }
}
