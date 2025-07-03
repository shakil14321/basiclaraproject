<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        table tr td,
        table tr td {
            padding: 10px 15px;

        }
    </style>

</head>

<body>
    <h1>All details</h1>
    <table border="1" cellpadding="0" cellspacing="0">
        <tr >
            <th>ID</th>
            <th>House No</th>
            <th>Road No</th>
            <th>Phone No</th>
            <th>Amount</th>
            <th>Created At</th>
        </tr>

        @if ($orders->isEmpty())
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->house_no }}</td>
                    <td>{{ $order->road_no }}</td>
                    <td>{{ $order->phone_no }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ Carbon\Carbon::parse($order->created_at)->format('d/m/y') }}</td>
                </tr>
            @endforeach



        @endif
    </table>

</body>

</html>
