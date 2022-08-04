<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Session::has('error'))
        <div class="alert alert-danger" style="color: red">
            {{ Session::get('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-danger" style="color: rgb(2, 153, 10)">
            {{ Session::get('success') }}
        </div>
    @endif
    @auth('account')
        <h1>Hello, {{ auth()->guard('account')->user()->username }}</h1>
        <a href="{{ route('auth.logout') }}">Logout</a>
        <a href="{{ route('test-user', ['account' => 15, 'token' => '321']) }}">Click</a>
    @endauth
    @guest('account')
        <h1>This is home page</h1>
        <a href="{{ route('auth.login') }}">Login</a>
    @endguest

</body>
</html>