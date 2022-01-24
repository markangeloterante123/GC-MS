<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Create User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Create a new account?  You can create an account for the employee and the system allows you to assign a role for the accounts as a USER ACCOUNT, and ADMIN ACCOUNT that has access to all functions inside the system. ') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group-add-acct col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Name') }}" />  
                <small></small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" />
                <x-jet-input-error for="user.name" class="mt-2" />
            </div>

            <div class="form-group-add-acct col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <small></small>
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" />
                <x-jet-input-error for="user.email" class="mt-2" />
            </div>
            
            @if ($action == "createUser")
            <div class="form-group-add-acct col-span-6 sm:col-span-5">
                <x-jet-label for="is_admin" value="{{ __('Account Type') }}" />
                <small></small>
                <select name="is_admin" id="is_admin" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="user.is_admin" required="">
                    <option value="">Select Role</option>
                    <option value="0">User Account</option>
                    <option value="1">Admin Account</option>
                </select>
            </div>

            <div class="form-group-add-acct col-span-6 sm:col-span-5">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <small></small>
                <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" />
                <x-jet-input-error for="user.password" class="mt-2" />
            </div>

            <div class="form-group-add-acct col-span-6 sm:col-span-5">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <small></small>
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" />
                <x-jet-input-error for="user.password_confirmation" class="mt-2" />
            </div>
            @endif
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
