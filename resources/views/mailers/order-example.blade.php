<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enviando orden de compra</title>
</head>
<body>
    <h1>MAYACADEMY</h1>
    <h1>Orden de compra</h1>
    <p>Gracias</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <td>Precio</td>
                <td>Descripción</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->pricing1}}</td>
                    <td>{{$product->description}}</td>
                </tr>
            @endforeach
            <tr>
                <td>Total</td>
                <td>{{$order->total}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>