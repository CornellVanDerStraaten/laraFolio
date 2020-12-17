@extends('layouts.layout')

@section('content')
<div class="loginAligner">
    <div class="loginControllerPageContainer">
        <h1 class="loginHeaderText">login</h1>
        <h2 class="loginHeaderSubtext">Vul hier jouw gegevens in</h2>
        <div class="login__container">
            <form action="{{ route('login') }}" class="login__form" method="POST">
                @csrf
                <span class="login__auth-hider">
                    <input type="email" name="email" class="login__input" placeholder="email" required value="{{ old('email') }}" autocomplete="email">
                    <input type="password" name="password" class="login__input border-top" placeholder="wachtwoord" required  autocomplete="current-password">
                </span>
                <input type="text" name="auth_code" class="login__input auth-input hide_auth" placeholder="authorizatie code" required>

            </form>

            <div class="form-submit__container">
                <div class="form-submit__light-background">
                    <div class="form-submit__dark-background">
                        <div class="form-submit__submit-triangle" id="submitTriangle"></div>
                    </div>
                </div>
            </div>
            <p class="loginFooterText">wachtwoord vergeten? @if (Route::has('password.request'))
                <a class="forgotPasswordLink a-tag_component" href="{{ route('password.request') }}">
                    {{ __('klik hier') }}
                </a>
            @endif </p>
        </div>
        {{-- <a class="forgotPasswordLink a-tag_component" href="{{ route('FP') }}">klik hier</a> --}}
        @error('password')
            <p class="melding-text" role="alert">
                <strong>{{ $message }}</strong>
            </p>
        @enderror
        @error('email')
        <span class="melding-text" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>

@endsection

@isset($submitted)
    <script>console.log('submitted')</script>
@endisset

