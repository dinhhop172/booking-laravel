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
    @if (session('success'))
        <div class="text-success">{{session()->get('success')}}</div> 
    @endif
    <form action="{{ route('repository.room.update', $data->id) }}" method="post">
        @csrf
        <div class="d-flex">
            <label for="">Name: </label>
            <input type="text" name="name" value="{{ $data->name }}"><br>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <label for="">Price: </label>
            <input type="number" name="price" value="{{ $data->price }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex" style="margin-bottom: 5px;">
            <label for="">Status: </label>
            <select name="status" id="">
                <option value="">--Choose--</option>
                <option value="{{($data->status == 1) ? 1 : '1'}}" {{($data->status == 1) ? 'selected' : ''}}>{{($data->status == 1) ? 'Active' : 'Active'}}</option>
                <option value="{{($data->status == 1) ? 0 : '0'}}" {{($data->status == 0) ? 'selected' : ''}}>{{($data->status == 1) ? 'Disable' : 'Disable'}}</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <label for=""></label>
            <input type="submit" name="submit" value="Update">
        </div>
    </form>
</body>
</html>