<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Clients Information') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Client</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Client Data</a></div>
        </div>
    </x-slot>

    <div>
       <livewire:client-data />
    </div>
    
</x-app-layout>
