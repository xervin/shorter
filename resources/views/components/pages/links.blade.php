<div class="links">
    <div class="links__container">
        <div class="links__table">
            <div class="links__tr">
                <div class="links__td links__th">
                    Токен
                </div>
                <div class="links__td links__th">
                    Ссылка
                </div>
                <div class="links__td links__th">
                    ip
                </div>
                <div class="links__td links__th">
                    Создана
                </div>
            </div>
            @forelse($links as $link)
                <div class="links__tr">
                    <div class="links__td">
                        {{ $link->token }}
                    </div>
                    <div class="links__td">
                        <a class="links__a" href="{{ $link->link }}">{{ env('APP_URL') }}/{{ $link->link }}</a>
                    </div>
                    <div class="links__td">
                        {{ $link->ip }}
                    </div>
                    <div class="links__td">
                        {{ $link->created_at }}
                    </div>
                </div>
            @empty
                <div class="links__tr">
                    <div colspan="4" class="links__td">
                        No links
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
