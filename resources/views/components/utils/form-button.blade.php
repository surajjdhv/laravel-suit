@props([
    'action' => '#',
    'method' => 'POST',
    'name' => '',
    'formClass' => 'd-inline',
    'buttonClass' => '',
    'icon' => false,
])

<form method="POST" action="{{ $action }}" name="{{ $name }}" class="{{ $formClass }}">
    @csrf
    @method($method)

    <button type="submit" class="{{ $buttonClass }}">
        <svg class="c-icon">
            <use xlink:href="{{ asset('icons/free.svg#' . $icon) }}"></use>
        </svg>
        {{ $slot }}
    </button>
</form>
