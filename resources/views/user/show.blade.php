@extends('layouts.app')

@section('content')
<x-card>
    <x-slot name="header">
        {{ $user->name }}
    </x-slot>
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" icon="cil-arrow-left" :href="route('user.index')" text="Back" />
    </x-slot>
    <x-slot name="body">
        <table class="table table-hover">
            <tbody>
               <tr>
                  <th>Name</th>
                  <td>{{ $user->name }}</td>
               </tr>
               <tr>
                  <th>Status</th>
                  <td>{!! $user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Deactivated</span>' !!}</td>
               </tr>
               <tr>
                  <th>Email</th>
                  <td>{{ $user->email }}</td>
               </tr>
            </tbody>
         </table>
    </x-slot>
    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('User Created'):</strong> {{ $user->created_at }} ({{ $user->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> {{ $user->updated_at }} ({{ $user->updated_at->diffForHumans() }})

            {{-- @if($user->trashed())
                <strong>@lang('Account Deleted'):</strong> @displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})
            @endif --}}
        </small>
    </x-slot>
</x-card>
@endsection
