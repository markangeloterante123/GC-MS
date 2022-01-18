<x-app-layout>
    <x-slot name="header_content">
        <h2>Dashboard</h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user.info') }}">Profile</a></div>
            <div class="breadcrumb-item"><a href="{{ route('update.account') }}">Update Profile</a></div>
        </div>
    </x-slot>

    <div class="overflow-hidden  sm:rounded-lg section-custom">
        <x-jet-welcome />
    </div>
</x-app-layout>
