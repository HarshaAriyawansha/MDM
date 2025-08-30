<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <h2> Titel : {{ $title }}</h2>
    <h2> Date : {{ $date }}</h2>

    <hr>

<style>
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #000; padding: 5px; text-align: center; }
</style>

<table class="mt-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Satus</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $cate)
        <tr>
            <td>{{ $cate->id }}</td>
            <td>{{ $cate->code }}</td>
            <td>{{ $cate->name }}</td>
            <td>{{ $cate->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    
</body>
</html>