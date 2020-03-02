@extends('layouts.app')

@section('content')
<div class="form">
    <h1 class="center">{{ __('Login') }}</h1>
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            <label for="email" class="label-name">
                <span class="content-name">
                    {{ __('E-Mail Address') }}
                </span>
            </label>

            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <label for="password" class="label-name">
                <span class="content-name">
                    {{ __('Password') }}
                </span>
            </label>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <button type="submit" class="button button-primary ripple">
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
            <a class="link link-primary default-link color-secondary right" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>
@endsection
