@extends('admin.master')
@section('container')
    <h1>Registrar Pago Compra</h1>

    <form action="{{route('pagocompra.crear')}}" method="post">
    {{csrf_field()}}
       {{--  <div class="form-group">
            <label for="exampleInputEmail1">Monto</label>
            <input name="monto" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar el monto...">
            @error('monto')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        <div class="form-group">
            <label for="facturaCompra">Factura Compra</label>
            <select name="facturaCompra" id="facturaCompra" class="custom-select"
                data-live-search="true" data-size="3" data-dropup-auto="false">
                <option value="0" selected >Seleccione:</option>
                @foreach (getFacturaCompra() as $facturacompra)
                    <option value="{{ $facturacompra->id }}_{{ $facturacompra->monto }}">{{ $facturacompra->descripcion }}</option>
                @endforeach
            </select>
            @error('facturaCompra_id')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="text" readonly name="monto" value="" id="monto" class="form-control" placeholder="Monto...">
        </div>


        <input type="hidden" name="facturaCompra_id" value="" id="facturaCompra_id">


        <a href="{{ route('pagocompra.index') }}" class="btn btn-info text-white"><i class="fas fa-arrow-left"></i> Retornar</a>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Pago Compra</button>
    </form>
    @push('scripts')
        <script>
            // document.addEventListener("DOMContentLoaded", function(e) {
            //     mostrar();
            // });
            const factura = document.getElementById('facturaCompra');
            factura.addEventListener("change", function(e) {
                mostrarlistado();
            });
            function mostrarlistado() {
                datosFactura = document.getElementById('facturaCompra').value.split('_');
                document.getElementById('monto').setAttribute("placeholder", datosFactura[1]);//
                document.getElementById('monto').setAttribute("value", datosFactura[1]);//
                document.getElementById('facturaCompra_id').setAttribute("value", datosFactura[0]);
            }
            // function mostrar() {
            //     // datosFactura = document.getElementById('facturaCompra_id').value.split('_');
            //     // document.getElementById("facturaCompra_id").value = datosFactura[0];
            // }
        </script>
    @endpush

@endsection
