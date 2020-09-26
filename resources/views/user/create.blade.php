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
            <div x-data="{ sendPassword: {{ old('send_password', true) ? 'true' : 'false' }}}">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Name</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" maxlength="100" required />
                        @error ('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">Email Address</label>

                    <div class="col-md-10">
                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}" maxlength="255" required />
                        @error ('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_active" class="col-md-2 col-form-label">Active</label>

                    <div class="col-md-10">
                        <div class="form-check">
                            <input name="is_active" id="is_active" class="form-check-input" type="checkbox" value="1" {{ old('is_active', true) ? 'checked' : '' }} />
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sendPassword" class="col-md-2 col-form-label">Send Password Through Email</label>

                    <div class="col-md-10">
                        <div class="form-check">
                            <input type="hidden" name="send_password" value="0">
                            <input name="send_password" id="send_password" class="form-check-input" type="checkbox" value="1" {{ old('send_password', true) ? 'checked' : '' }} x-model="sendPassword" />
                        </div>
                    </div>
                </div>

                <div class="form-group row" x-show="! sendPassword">
                    <label for="password" class="col-md-2 col-form-label">Password</label>

                    <div class="col-md-10">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" maxlength="100" required x-bind:disabled="sendPassword" />
                    </div>
                </div>

                <div class="form-group row" x-show="! sendPassword">
                    <label for="password_confirmation" class="col-md-2 col-form-label">Password Confirmation</label>

                    <div class="col-md-10">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Password Confirmation" maxlength="100" required x-bind:disabled="sendPassword" />
                        @error ('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">Create User</button>
        </x-slot>
    </x-card>
</x-form.put>
@endsection
