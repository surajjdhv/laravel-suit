<form method="post" {{ $attributes->merge(['action' => '#', 'class' => 'form-horizontal']) }}>
    @csrf
    @method('PATCH')

    {{ $slot }}
</form>
