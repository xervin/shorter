<div class="login-form login-form__reset">
    <form class="login-form__form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <h2 class="h2 forgot-password-form__h2">Введите новый пароль</h2>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="login-form__row">
            <div class="login-form__label">E-mail:</div>
            <input type="email" name="email" class="input login-form__input" placeholder="Email" value="{{ $email }}" autocomplete="off">
        </div>
        <div class="login-form__row">
            <div class="login-form__label">Пароль:</div>
            <input type="password" name="password" class="input login-form__input" placeholder="Пароль" autocomplete="off">
        </div>
        <div class="register-form__row">
            <div class="register-form__label">Подтверждение пароля:</div>
            <input type="password" name="password_confirmation" class="input register-form__input" placeholder="Подтверждение пароля" autocomplete="off">
        </div>
        <div class="login-form__row">
            <input type="submit" class="input login-form__submit">
        </div>
    </form>
</div>
