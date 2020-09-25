<form method="post" {{ $attributes->merge(['action' => '#', 'class' => 'form-horizontal']) }}>
    @csrf
    @method('PUT')

    {{ $slot }}
</form>
