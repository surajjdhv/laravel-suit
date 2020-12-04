@props(['action' => '', 'collection' => false])

<div>
    <x-form.get :action="$action">
        <div class="d-flex justify-content-between">
            <select name="size" class="form-control" style="width: 70px;">
                <option value="10" {{ request()->query('size') == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ request()->query('size') == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ request()->query('size') == 20 ? 'selected' : '' }}>20</option>
            </select>
            <div class="input-group mb-3 w-50">
                <input type="text" name="filter[search]" value="{{ request()->query()['filter']['search'] ?? '' }}" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-sm btn-secondary">
                        <svg class="c-icon">
                            <use xlink:href="{{ asset('icons/free.svg#cil-magnifying-glass') }}"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </x-form.get>
    {{ $slot }}

    @if ($collection)
        {{ $collection->links() }}
    @endif
</div>

@push('after-scripts')
<script>
$(document).ready(function () {
    $('select[name="size"]').on('change', function () {
        $(this).closest('form').submit();
    })
});
</script>
@endpush
