@extends('admin.master')
@section('container')
{{-- <main class="main"> --}}
 <div class="panel">
  <h2 class="text-center">Detalle Pedido de Venta</h2><br>
        <div class="form-group row">
            <div class="col-lg-4">
                <label class="form-control-label text-black-50" for="nombre">Cliente:</label>
                <p>{{$pedidoventa->cliente->nombre}}</p>
            </div>
            <div class="col-lg-4">
                <label class="form-control-label text-black-50" for="num_compra">Número de Pedido Venta:</label>
                <p>{{$pedidoventa->id}}</p>
            </div>
            <div class="col-lg-4">
                <label class="form-control-label text-black-50" for="num_compra">Fecha:</label>
                <p>{{$pedidoventa->created_at}}</p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label class="form-control-label text-black-50" for="nombre">Descripción:</label>
                <p>{{$pedidoventa->descripcion}}</p>
            </div>
        </div>
        <div class="col-lg-6 col-xl-12 col-md-6" style="">
            <div class="form-group">
                <a href="{{ route('pedidoventa.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Atras</a>
            </div>
        </div>
        </div>
{{-- </main> --}}

@endsection
