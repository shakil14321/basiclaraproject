<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>



    <div class="bg-dark">
        <div class="container">
            <h1 class="text-white text-center py-3">All details</h1>
        </div>
    </div>

    <center>
        <form action="search_data" method="GET">

            <input type="text" name="search">
            <button type="submit">search</button>

        </form>
    </center>


    <div class="container">
        <div class="py-2">
            <a href="{{ url('/download-orders') }}" class="btn btn-prymary">Download PDF</a>
        </div>

        <br>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>House No</th>
                <th>Road No</th>
                <th>Phone No</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr>

            {{-- @if ($orders->isEmpty()) --}}
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
            {{-- @endif --}}
        </table>
    </div>
</body>

</html>
