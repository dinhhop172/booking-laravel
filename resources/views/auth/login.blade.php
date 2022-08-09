@extends('layouts.auth.master')
@section('title', 'Login')
@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">
                        <h3 class="text-center mt-4">
                            <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/logo-dark.png') }}"
                                    height="30" alt="logo"></a>
                        </h3>
                        <div class="p-3">
                            <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center">Sign in to continue to Lexa.</p>
                            @if (session('succRegis'))
                                <div class="alert alert-success">
                                    {{ session('succRegis') }}
                                </div>
                            @endif
                            <form class="form-horizontal mt-4" action="{{ route('auth.sublogin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" @if(Cookie::has('adminmail')) value="{{ Cookie::get('adminmail') }}" @endif  id="email" placeholder="Enter email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" @if(Cookie::has('adminpwd')) value="{{ Cookie::get('adminpwd') }}" @endif id="password" placeholder="Enter password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="form-group row mt-4">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember_me" @if(Cookie::has('adminmail')) checked @endif class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        {{-- <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button> --}}
                                        <input type="submit" name="sub-login" class="btn btn-primary w-md waves-effect waves-light" value="Log In">
                                    </div>
                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>Don't have an account ? <a href="{{ route('auth.register') }}" class="text-primary"> Signup Now </a></p>
                    <p>© 2018 - 2020 Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    <a href="{{ route('facebook.login') }}" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i>
                        Login with Facebook
                     </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection