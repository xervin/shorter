<div class="main-form">
    <form class="main-form__form" method="POST" action="{{ route('form.set-link') }}">
        @csrf
        <input type="url" name="link" class="input main-form__input-link" placeholder="Место для ссылки">
        <input type="submit" class="input main-form__submit">
    </form>
</div>
