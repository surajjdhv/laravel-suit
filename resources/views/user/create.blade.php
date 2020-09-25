@extends('layouts.app')

@section('content')
<x-form.put :action="route('user.store')">
    <x-card>
        <x-slot name="header">
            Create User
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" icon="cil-arrow-left" :href="route('user.index')" text="Back" />
        </x-slot>
        <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Name</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email Address</label>

                    <div class="col-md-10">
                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" maxlength="255" required />
                        @error ('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Create User</button>
        </x-slot>
    </x-card>
</x-form.put>
@endsection
