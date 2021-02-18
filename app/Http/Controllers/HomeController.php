<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\PagosCompra;
use App\PagosVenta;
use App\Proveedor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $compra = PagosCompra::where('estado',0)->where('empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId)->get()->last();
        $venta = PagosVenta::where('estado',0)->where('empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId)->get()->last();
        $cliente = Cliente::where('estado',0)->where('empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId)->get()->last();
        $proveedor = Proveedor::where('estado',0)->where('empresaId', \Illuminate\Support\Facades\Auth::user()->empresaId)->get()->last();
        return view('home',[ 'compra' => $compra, 'venta' => $venta, 'cliente' => $cliente, 'proveedor' => $proveedor ]);
    }
}
