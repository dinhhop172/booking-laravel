
<h3>Vui long check mail de lay code</h3>
    {{-- {{dd($data)}} --}}
<form action="{{ route('auth.verify-admin') }}" method="POST">
    @csrf
    <input type="number" name="verification_code" placeholder="Ex: 123456">
    <input type="hidden" name="email" value="@if(Session::has('data')){{ Session::get('data')['credentials']['email']}} @endif">
    <input type="hidden" name="password" value="@if(Session::has('data')){{ Session::get('data')['credentials']['password']}} @endif">
    <input type="hidden" name="remember" value="@if(Session::has('data')){{ Session::get('data')['remember']}}@else 0 @endif">
    <input type="submit" value="Submit">
    @if (Session::has('error'))
        <div class="alert alert-danger" style="color: red">
            {{ Session::get('error') }}
        </div>
    @endif
</form>