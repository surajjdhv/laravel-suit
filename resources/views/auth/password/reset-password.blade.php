@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card-group">
			<div class="card p-4">
				<div class="card-body">
					<x-form.post :action="route('password.update')">
                        <h1>Reset Password</h1>
                        <p class="text-muted">Reset your password</p>
                        @include('includes.messages')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="{{ asset('icons/free.svg#cil-user') }}"></use>
                                    </svg>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="email" value="{{ $email ?? old('email') }}" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="{{ asset('icons/free.svg#cil-lock-locked') }}"></use>
                                    </svg>
                                </span>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg class="c-icon">
                                        <use xlink:href="{{ asset('icons/free.svg#cil-lock-locked') }}"></use>
                                    </svg>
                                </span>
                            </div>
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Reset Password</button>
                            </div>
                        </div>
					</x-form.post>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
