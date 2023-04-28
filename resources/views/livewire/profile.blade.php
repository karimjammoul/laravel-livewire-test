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

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input wire:model="user.name" id="name" type="text" class="mt-1 w-full" required autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('user.name')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="user.email" id="email" type="email" class="mt-1 w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('user.email')" />
                </div>

                <div>
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <x-text-input wire:model="user.phone_number" id="phone_number" type="text" class="mt-1 w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('user.phone_number')" />
                </div>

                <div>
                    <x-input-label for="gender_id" :value="__('Gender')" />
                    <select wire:model="user.gender_id" id="gender_id" name="gender_id"
                            class="w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- choose gender --</option>
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('user.gender_id')" />
                </div>

                <div>
                    <x-input-label for="department_id" :value="__('Department')" />
                    <select wire:model="user.department_id" id="department_id" name="department_id"
                            class="w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- choose department --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('user.department_id')" />
                </div>

                <div>
                    <x-input-label for="role_id" :value="__('Role')" />
                    <select wire:model="user.role_id" id="role_id" name="role_id"
                            class="w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- choose role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('user.role_id')" />
                </div>
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>

        </form>
    </section>
</div>
