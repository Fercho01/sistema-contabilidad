<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Contanube') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @include('layouts.navbar')

    <div class="d-flex">
        @include('layouts.sidebar')
        <div class="container" style="margin-top: 20px;margin: 20px">
            <div class="row">
                {{-- 1 --}}
                @can('pagocompra.index')
                    <div class="col-lg-5 text-white" style="background: #5A5AD7;padding: 10px;" >
                        <div class="dentro" style="background-color: #7575ee;padding: 5px;margin-bottom: -10px;">
                            <h3 class="text-white" style="display: inline;margin-right: 10px;">Compra</h3><i style="font-size: 30px;" class="fas fa-shopping-cart"></i>
                            <p style="font-size: 15px;">Última Compra:
                                @if ( empty($compra) )
                                    Ninguna Compra
                                @else
                                    {{ $compra->monto }} Bs
                                @endif
                            </p>
                        </div>
                        <div class="text-center" href="#" style="background-color: #ababf3;">
                            <a href="{{ route('pagocompra.index') }}" class="text-white"><i class="fas fa-info"></i> Más Información</a>
                        </div>
                    </div>
                @endcan
                {{-- 2 --}}
                @can('proveedor.index')
                    <div class="col-lg-5 text-white" style="background: #68AAED;padding: 10px;margin-left: 20px" >
                        <div class="dentro" style="background-color: #79b7f5;padding: 5px;margin-bottom: -10px;">
                            <h3 class="text-white" style="display: inline;margin-right: 10px;">Proveedor</h3><i style="font-size: 30px;" class="fas fa-truck"></i>
                            <p style="font-size: 15px;">Último Proveedor:
                                @if ( empty($proveedor) )
                                Ningun Proveedor
                                @else
                                    {{ $proveedor->nombre }}
                                @endif
                            </p>
                        </div>
                        <div class="text-center" href="#" style="background-color: #82bbf3;">
                            <a href="{{ route('proveedor.index') }}" class="text-white"><i class="fas fa-info"></i> Más Información</a>
                        </div>
                    </div>
                @endcan


            </div>

            <div class="row" style="margin-top: 20px">
                {{-- 1 --}}
                @can('cliente.index')
                    <div class="col-lg-5 text-white" style="background: #f6960b;padding: 10px;" >
                        <div class="dentro" style="background-color: #f09e2c;padding: 5px;margin-bottom: -10px;">
                            <h3 class="text-white" style="display: inline;margin-right: 10px;">Cliente</h3><i style="font-size: 30px;" class="far fa-user"></i>
                            <p style="font-size: 15px;">Última Cliente:
                                @if ( empty($cliente) )
                                Ninguna Cliente
                                @else
                                    {{ $cliente->nombre }}
                                @endif
                            </p>
                        </div>
                        <div class="text-center" href="#" style="background-color: #f0b461;">
                            <a href="{{ route('cliente.index') }}" class="text-white"><i class="fas fa-info"></i> Más Información</a>
                        </div>
                    </div>
                @endcan



                {{-- 2 --}}
                @can('pagoventa.index')
                    <div class="col-lg-5 text-white" style="background: #18cc72;padding: 10px;margin-left: 20px" >
                        <div class="dentro" style="background-color: #29d47f;padding: 5px;margin-bottom: -10px;">
                            <h3 class="text-white" style="display: inline;margin-right: 10px;">Venta</h3><i style="font-size: 30px;" class="fas fa-chart-line"></i>
                            <p style="font-size: 15px;">Última Venta:
                                @if ( empty($venta) )
                                Ninguna Venta
                                @else
                                    {{ $venta->monto }} Bs
                                @endif
                            </p>
                        </div>
                        <div class="text-center" href="#" style="background-color: #43eb97;">
                            <a href="{{ route('pagoventa.index') }}" class="text-white"><i class="fas fa-info"></i> Más Información</a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</body>
</html>
