@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
$color = match ($level) {
'success', 'error' => $level,
default => 'primary',
};
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}
@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
*С уважением, команда __"{{ config('app.name') }}\"__*
@endif

{{-- Subcopy --}}
@isset($actionText)
Если у вас возникли проблемы при нажатии на кнопку \"{{ $actionText }}\", то скопируйте данный текст в строку браузера<br>
<span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endisset
@endcomponent
