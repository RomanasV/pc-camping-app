@extends('layouts.app')

@section('content')
<div class="form">
    <h1 class="center">{{ __('Reset Password') }}</h1>
    <form class="login-form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

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
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
            <label for="password" class="label-name">
                <span class="content-name">
                    {{ __('Password') }}
                </span>
            </label>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm" class="label-name">
                <span class="content-name">
                    {{ __('Confirm Password') }}
                </span>
            </label>
        </div>

        <button type="submit" class="button button-primary ripple">
            {{ __('Reset Password') }}
        </button>
    </form>
</div>
@endsection
