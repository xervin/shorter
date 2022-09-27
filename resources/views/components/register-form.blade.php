<div class="register-form">
    <form class="register-form__form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register-form__row">
            <div class="register-form__label">Имя:</div>
            <input type="text" name="name" class="input register-form__input" placeholder="Имя" value="{{ old('name') }}" autocomplete="off">
        </div>
        <div class="register-form__row">
            <div class="register-form__label">E-mail:</div>
            <input type="email" name="email" class="input register-form__input" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
        </div>
        <div class="register-form__row">
            <div class="register-form__label">Пароль:</div>
            <input type="password" name="password" class="input register-form__input" placeholder="Пароль" autocomplete="off">
        </div>
        <div class="register-form__row">
            <div class="register-form__label">Подтверждение пароля:</div>
            <input type="password" name="password_confirmation" class="input register-form__input" placeholder="Подтверждение пароля" autocomplete="off">
        </div>
        <div class="register-form__row">
            <input type="submit" class="input register-form__submit">
        </div>
    </form>
</div>
