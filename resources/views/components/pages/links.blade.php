<div class="links">
    <div class="links__container">
        <table class="links__table">
            <thead>
            <tr class="links__tr">
                <th class="links__th">
                    Токен
                </th>
                <th class="links__th">
                    Ссылка
                </th>
                <th class="links__th">
                    ip
                </th>
                <th class="links__th">
                    Создана
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($links as $link)
                <tr class="links__tr">
                    <td class="links__td">
                        {{ $link->token }}
                    </td>
                    <td class="links__td">
                        {{ $link->link }}
                    </td>
                    <td class="links__td">
                        {{ $link->ip }}
                    </td>
                    <td class="links__td">
                        {{ $link->created_at }}
                    </td>
                </tr>
            @empty
                <tr class="links__tr">
                    <td colspan="4" class="links__td">
                        No links
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
