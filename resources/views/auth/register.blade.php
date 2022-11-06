@extends('layouts.app')

<x-header>
    <x-site-title name="Sign Up" />
</x-header>

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 py-5">
            <form method="POST" action="{{ route('register') }}" class="validate-form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 validate-input">
                        <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="first name">
                        <span class="shadow-input1"></span>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 validate-input">
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="last name">
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="form-group validate-input">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group validate-input">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 validate-input">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group col-md-6 validate-input">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                    </div>
                </div>
                <x-button type="submit" name="Register" class="btn btn-primary btn-block" />
            </form>
        </div>
        <div class="col-12 text-center">
            <x-link name="Already have an account? Sign In." href="{{ route('login') }}" />
        </div>
    </div>
</div>

@endsection
