<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <a href="{{ route('repository.room.create') }}">Create a room</a>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('repository.room.edit', $item->id) }}">Edit</a>
                    <a href="{{ route('repository.room.delete', $item->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>