<div class="login-form">
    <form class="login-form__form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-form__row">
            <div class="login-form__label">E-mail:</div>
            <input type="email" name="email" class="input login-form__input" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
        </div>
        <div class="login-form__row">
            <div class="login-form__label">Пароль:</div>
            <input type="password" name="password" class="input login-form__input" placeholder="Пароль" autocomplete="off">
        </div>
        <div class="login-form__row">
            <input type="submit" class="input login-form__submit">
        </div>
        <div class="login-form__row login-form__forgot-password">
            <a href="{{ route('password.request') }}" class="login-form__link">Забыли пароль?</a>
        </div>
    </form>
</div>
