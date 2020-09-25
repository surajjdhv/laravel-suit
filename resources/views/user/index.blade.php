@extends('layouts.app')

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
        <table class="table table-bordered table-responsive-sm">
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
                        <td>{!! $user->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactivated</span>' !!}</td>
                        <td>
                            <a class="btn btn-ghost-primary" title="View" href="{{ route('user.show', $user->id) }}">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('icons/free.svg#cil-lightbulb') }}"></use>
                                </svg>
                            </a>
                            <a class="btn btn-ghost-info" title="Edit">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('icons/free.svg#cil-pencil') }}"></use>
                                </svg>
                            </a>
                            <a class="btn btn-ghost-danger" title="Delete">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('icons/free.svg#cil-trash') }}"></use>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-card>
@endsection
