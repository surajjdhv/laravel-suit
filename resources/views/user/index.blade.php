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
            href="#"
            text="Create User"
        />
    </x-slot>
    <x-slot name="body">

    </x-slot>
</x-card>
@endsection
