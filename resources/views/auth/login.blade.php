@extends('layouts.app')

<x-header>
    <x-site-title name="Sign In" />
</x-header>

@section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 py-5">
                    <form class="validate-form mx-auto" method="POST" ction="{{ route('login') }}">
                         @csrf
                        <div class="form-group validate-input">
                            <input class="form-control @error('username') is-invalid @enderror" type="username" name="username"  value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group validate-input">
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <x-button type="submit" name="Log in" class="btn btn-primary btn-block" />    
                    </form>
                </div>
                <div class="col-12 text-center">
                    <x-link name="Don't have an account yet? Sign Up." href="{{ route('register') }}" />
                </div>
            </div>
        </div>

@endsection