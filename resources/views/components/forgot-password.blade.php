<div class="forgot-password-form">
    <form class="forgot-password-form__form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2 class="h2 forgot-password-form__h2">Сброс пароля</h2>
        <div class="forgot-password-form__row">
            <div class="forgot-password-form__label">E-mail:</div>
            <input type="email" name="email" class="input forgot-password-form__input" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="forgot-password-form__row">
            <div class="forgot-password-form__note">
                Введите свой email в поле и нажмите "Отправить".<br>
                На ваш почтовый ящик придет ссылка, по которой необходимо перейти
            </div>
        </div>
        <div class="forgot-password-form__row">
            <input type="submit" class="input forgot-password-form__submit">
        </div>
    </form>
</div>
