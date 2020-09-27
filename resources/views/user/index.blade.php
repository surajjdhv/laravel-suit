@extends('layouts.app')

@section('breadcrumb-links')
    <x-utils.link class="c-subheader-nav-link" :href="route('user.deleted.index')" text="Deleted Users" />
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        User Management
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="cil-plus"
            class="card-header-action"
            :href="route('user.create')"
            text="Create User"
        />
    </x-slot>
    <x-slot name="body">
        <div>
            <x-form.post action="#">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <svg class="c-icon">
                                <use xlink:href="{{ asset('icons/free.svg#cil-magnifying-glass') }}"></use>
                            </svg>
                            Search
                        </button>
                    </div>
                </div>
            </x-form.post>
        </div>
        <table class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{!! $user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactivated</span>' !!}</td>
                        <td>
                            <a class="btn btn-sm btn-ghost-primary" title="View" href="{{ route('user.show', $user->id) }}">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('icons/free.svg#cil-lightbulb') }}"></use>
                                </svg>
                                View
                            </a>
                            <a class="btn btn-sm btn-ghost-info" title="Edit" href="{{ route('user.edit', $user->id) }}">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('icons/free.svg#cil-pencil') }}"></use>
                                </svg>
                                Edit
                            </a>
                            <x-utils.form-button
                                buttonClass="btn btn-sm btn-ghost-danger"
                                icon="cil-trash"
                                :action="route('user.delete', $user->id)"
                                method="DELETE"
                            >
                                Delete
                            </x-utils.form-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-card>
@endsection
