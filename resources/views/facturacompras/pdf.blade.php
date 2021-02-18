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
        Factura Compra
    </h3>
    <h5>
        Proveedor: {{$facturacompra->pedidoCompra->proveedor->nombre}}
    </h5>
    <div class="container">
        <div class="row justify-content-center">
            <br>
            <br>
            <table class="table mt-3 table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="border">Descripción</th>
                        <th scope="border">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $facturacompra->descripcion }}</td>
                        <td>{{ $facturacompra->monto }} </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
