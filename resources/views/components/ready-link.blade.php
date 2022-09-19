@isset($link)
    <div class="ready-link">
        <div class="ready-link__inner">
            <div class="ready-link__label-wrapper">
                Ваша короткая ссылка:
            </div>
            <div class="ready-link__link-wrapper">
                <a target="_blank" href="{{ $link }}">{{ $link }}</a>
            </div>
        </div>
    </div>
@endisset
