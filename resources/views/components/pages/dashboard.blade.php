<div class="dashboard">
    <h2 class="h2 dashboard__title">Что можно посмотреть?</h2>
    <div class="dashboard__menu">
        <ul class="dashboard__list">
            <li class="dashboard__list-item">
                <a href="{{ route('pages.index') }}">Создать ссылку</a>
            </li>
            <li class="dashboard__list-item">
                <a href="{{ route('pages.links') }}">Созданные ссылки</a>
            </li>
            <li class="dashboard__list-item">
                <a href="{{ route('pages.stats') }}">Статистика переходов</a>
            </li>
            <li class="dashboard__list-item">
                <a href="{{ route('pages.user') }}">О себе</a>
            </li>
        </ul>
    </div>
</div>
