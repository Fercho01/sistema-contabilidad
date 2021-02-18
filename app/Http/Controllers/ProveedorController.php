<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
    //
    public  function  index(){
        return view('proveedores.lista');
    }
    public function create(Request $request){
        $this->validate($request,[
            'nombre' =>'required',
            'ci' => 'required',
            'empresa' => 'required'
        ]);
        $request['empresaId'] = Auth::user()->empresaId;
        $request['estado'] = 0;
        $proveedor = Proveedor::create($request->all());
        $proveedor->save();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Registró al proveedor: $proveedor->nombre $proveedor->apellido",
            'empresaId' => Auth::user()->empresaId,
        ]);
        return redirect()->back()->with('info','Creado con éxito');
    }
    public  function registrar(){
        return view('proveedores.crear');
    }

    public function update(Request $request,$id){
        $proveedor = Proveedor::findOrFail($id);
        $nombre = "$proveedor->nombre $proveedor->apellido";
        $proveedor->update($request->all());
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Actualizó los datos del proveedor: $nombre"
        ]);
        return redirect()->back()->with('act','Actualizado con éxito');
    }
    public function delete($id){
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->estado = 1;
        $proveedor->update();
        Bitacora::create([
            'user_id' => Auth::id(),
            'accion' => "Eliminó al proveedor: $proveedor->nombre $proveedor->apellido"
        ]);
        return redirect()->back()->with('delete','Eliminado con éxito');
    }

}
