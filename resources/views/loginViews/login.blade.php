@extends('layout')
 {{$x = 1}}
@section('content')
<div class="loginControllerPageContainer">
    <h1 class="loginHeaderText">login</h1>
    <h2 class="loginHeaderSubtext">Vul hier jouw gegevens in</h2>
    <div class="login__container">
        <form action="{{ route('login.process') }}">
            @csrf
            <input type="text" name="email" class="login__input">
            <input type="text" name="wachtwoord" class="login__input">
            <input type="text" name="auth_code" class="login__input">
        </form>
        <div class="form-submit__container">
            <div class="form-submit__light-background">
                <div class="form-submit__dark-background">
                    <div class="form-submit__submit-triangle" id="submitTriangle"></div>
                </div>
            </div>
        </div>
    </div>
    <p class="loginFooterText">wachtwoord vergeten? <a class="forgotPasswordLink a-tag_component" href="{{ route('FP') }}">klik hier</a></p>

    @if ($x = 1)
        <div class="melding">
            <p class="melding-text">Error text</p>
        </div>
    @endif
</div>
@endsection
