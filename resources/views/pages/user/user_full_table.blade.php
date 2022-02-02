@extends('layouts.docView')
@section('content')
    <x-slot name="header_content">
        <h4>{{ __('Full data table') }}</h4>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}"> User Info</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Full View Data</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:userfulldata />
    </div>
@endsection
