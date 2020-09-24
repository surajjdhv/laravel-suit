@props(['active' => '', 'text' => '', 'hide' => false, 'icon' => false])

<a {{ $attributes->merge(['href' => '#', 'class' => $active]) }}>
    @if ($icon)
        <svg class="c-icon">
            <use xlink:href="{{ asset('icons/free.svg#' . $icon) }}"></use>
        </svg>
    @endif
    {{ strlen($text) ? $text : $slot }}
</a>
