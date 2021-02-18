<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <h3 class="h3 text-center">
        Factura Venta
    </h3>
    <h5>
        Cliente: {{$facturaventa->pedidoVenta->cliente->nombre}}
    </h5>
    <div class="container">
        <div class="row justify-content-center">
            <br>
            <br>
            <table class="table mt-3 table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="border">Producto</th>
                        <th scope="border">Precio (Bs.)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $facturaventa->descripcion }}</td>
                        <td>{{ $facturaventa->monto }} </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
