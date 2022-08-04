<h1 style="text-align: center">Verify email</h1>
<div>
    <p>Hello <b>{{ $user->username }}</b>, your email is {{ $user->email }} </p>
    <p>Please click this under button to verify your email</p>
    <p>Note: This mail is only valid for 24 hours</p>
    <a style="color: #fff;
    background-color: #3eb7ba;
    border-color: #3eb7ba;
    padding: 5px 10px; text-decoration: none;" href="{{ route('actived-user', ['account' => $user->id, 'token' => $user->verification_code]) }}" style="">Verify mail</a>
</div>