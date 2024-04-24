<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        label {
            width: 5%;
        }
        input {
            width: 20%;
            margin-bottom: 5px;
        }
        .d-flex{
            display: flex;
        }
        .text-danger{
            color: red;
        }
        .text-success{
            color: green;
        }
    </style>
</head>
<body>
    <form action="{{ route('repository.room.store') }}" method="post">
        @csrf
        <div class="d-flex">
            <label for="">Name: </label>
            <input type="text" name="name" value="{{ old('name') }}"><br>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <label for="">Price: </label>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex" style="margin-bottom: 5px;">
            <label for="">Status: </label>
            <select name="status" id="">
                <option value="1">Active</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <label for=""></label>
            <input type="submit" name="submit" value="Add a room">
        </div>
    </form>
</body>
</html>