<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @extends('layout_backend.conquer')
    @section('content')
        <div class="container">
            <h2>3 Best selling products</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Total Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bestSellingProducts as $bestSellingProduct)
                    <tr>
                        <td>{{ $bestSellingProduct->product->name }}</td>
                        <td>{{ $bestSellingProduct->total_quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
    @endsection
</body>


</html>
