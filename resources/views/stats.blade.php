@extends('layouts.app')

@section('info')
    <x-info-bar></x-info-bar>
@endsection

@section('content')
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
                        Переходы
                    </div>
                    <div class="links__td links__th">
                        Последний переход
                    </div>
                </div>
                @forelse($links as $link)
                    <div class="links__tr">
                        <div class="links__td">
                            {{ $link->token }}
                        </div>
                        <div class="links__td">
                            <a class="links__a" href="{{ env('APP_URL') }}/{{ $link->token }}">{{ env('APP_URL') }}/{{ $link->token }}</a>
                        </div>
                        <div class="links__td">
                            {{ $link->redirection_count }}
                        </div>
                        <div class="links__td">
                            {{ $link->created_at }}
                        </div>
                    </div>
                @empty
                    <div class="links__tr">
                        <div class="links__td">
                            No links
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection
