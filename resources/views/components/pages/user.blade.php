<div class="user">
    <h2 class="h2 user__title">Информация о пользователе</h2>
    <div class="user__menu">
        <div class="user__container">
            <div class="user__row">
                <div class="user__label">
                    ID:
                </div>
                <div class="user__field">
                    {{ \Illuminate\Support\Facades\Auth::user()->id }}
                </div>
            </div>
            <div class="user__row">
                <div class="user__label">
                    Имя:
                </div>
                <div class="user__field">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </div>
            </div>
            <div class="user__row">
                <div class="user__label">
                    Email:
                </div>
                <div class="user__field">
                    {{ \Illuminate\Support\Facades\Auth::user()->email }}
                </div>
            </div>
            <div class="user__row">
                <div class="user__label">
                    Создан:
                </div>
                <div class="user__field">
                    {{ \Illuminate\Support\Facades\Auth::user()->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>
