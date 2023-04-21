<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
    <p>User: {{ $order->user->name }}</p>
    <p>Total: {{ $order->total }} DH</p>
    <p>Address: {{ $order->user->adress }}</p>
    <p>Phone: {{ $order->user->phone }}</p>
    <table>
        <thead>
            <tr>
                <th class="p-4">Product</th>
                <th class="p-4">Quantity</th>
                <th class="p-4">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_line as $order_line)
            <tr>
                <td>{{ $order_line->product->name }}</td>
                <td>{{ $order_line->quantity }}</td>
                <td>{{ $order_line->prix_q }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>