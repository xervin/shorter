<header class="header">
    <div class="header__inner">
        <div class="header__wrapper">
            <div class="header__logo">
                <a href="{{ route('pages.index') }}" class="h2 header__h2">Shorter</a>
            </div>
        </div>
        <div class="header__content">
            <div class="header__auth">
                @if (\Illuminate\Support\Facades\Auth::guest())
                    <div class="header__login">
                        <a href="{{ route('login.form') }}" class="link">Вход</a>
                    </div>
                    <div class="header__registration">
                        <a href="{{ route('register.form') }}" class="link">Регистрация</a>
                    </div>
                @else
                    <div class="header__menu">
                        <a href="{{ route('pages.dashboard') }}" class="link">Меню</a>
                    </div>
                    <div class="header__logout">
                        <a href="{{ route('logout') }}" class="link">Выход</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
