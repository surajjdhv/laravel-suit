@extends('layouts.app')

@section('content')
<x-card>
    <x-slot name="header">
        Deleted Users
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
                @foreach ($deletedUsers as $deletedUser)
                    <tr>
                        <td>{{ $deletedUser->id }}</td>
                        <td>{{ $deletedUser->name }}</td>
                        <td>{!! $deletedUser->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactivated</span>' !!}</td>
                        <td>
                            <x-utils.form-button
                                buttonClass="btn btn-sm btn-ghost-info"
                                icon="cil-loop-circular"
                                :action="route('user.deleted.restore', $deletedUser->id)"
                                method="PATCH"
                            >
                                Restore
                            </x-utils.form-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-card>
@endsection
