@php
    $userAcc = auth()->user();
@endphp

<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    Email
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                <th><a wire:click.prevent="sortBy('position')" role="button" href="#">
                    Position
                    @include('components.sort-icon', ['field' => 'position'])
                </a></th>
                <th><a wire:click.prevent="sortBy('employement_status')" role="button" href="#">
                    Employement Status
                    @include('components.sort-icon', ['field' => 'employement_status'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    @if($userAcc->id != $user->id)
                    <td>{{ $user->id }}</td>
                    <td class="userInformationTable">
                        <a href="{{ url('user/information/'.$user->id) }}">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"class="mr-3 rounded-circle" style="width:40px; height:40px;">
                        </a> 
                        {{ $user->name }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->position }}</td>
                    <td>{{ $user->employement_status }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ url('user/information/'.$user->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        @if($user->is_admin == 0)
                            <a role="button" x-on:click.prevent="deleteItem" href="#" class="mr-3"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        @endif
                    </td>
                    @endif
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
