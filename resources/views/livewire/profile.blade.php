<div>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Profile Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form wire:submit.prevent="save" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="user.name" id="name" type="text" class="mt-1 block w-full" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('user.name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="user.email" id="email" type="email" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('user.email')" />
            </div>

            <div>
                <x-input-label for="phone_number" :value="__('Phone Number')" />
                <x-text-input wire:model="user.phone_number" id="phone_number" type="text" class="mt-1 block w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('user.phone_number')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>

        </form>
    </section>
</div>
