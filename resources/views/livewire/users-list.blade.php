<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-4">
                        <div class="mb-4">
                            <x-primary-button wire:click.prevent="openModal" class="mb-4">
                                Add User
                            </x-primary-button>
                        </div>
                    </div>

                    <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle sm:rounded-md">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Name</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Email</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Phone Number</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Gender</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Department</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Role</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @forelse($users as $user)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->phone_number }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->gender->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->department->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $user->role->name }}
                                    </td>
                                    <td>
                                        <x-primary-button wire:click="editUser({{ $user->id }})" id="user.{{ $user->id }}.edit">
                                            Edit
                                        </x-primary-button>
                                        <button wire:click="deleteConfirm('delete', {{ $user->id }})" id="user.{{ $user->id }}.delete" class="px-4 py-2 text-xs text-red-500 uppercase bg-red-200 rounded-md border border-transparent hover:text-red-700 hover:bg-red-300">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 text-center" colspan="7">
                                        No users available
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>

    {{-- Add Category Modal --}}
    <div class="@if (!$showModal) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
        <div class="w-1/2 bg-white rounded-lg">
            <form wire:submit.prevent="save" class="w-full">
                @csrf
                <div class="flex flex-col p-4">
                    <div class="flex items-center pb-4 mb-4 w-full border-b">
                        <div class="text-lg font-medium text-gray-900">Create User</div>
                        <svg wire:click.prevent="$set('showModal', false)"
                             class="ml-auto w-6 h-6 text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:model.defer="user.name" id="name" type="text" class="mt-1 w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('user.name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model.defer="user.email" id="email" type="email" class="mt-1 w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('user.email')" />
                        </div>

                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input wire:model.defer="user.phone_number" id="phone_number" type="text" class="mt-1 w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('user.phone_number')" />
                        </div>

                        <div>
                            <x-input-label for="gender_id" :value="__('Gender')" />
                            <select wire:model.defer="user.gender_id" id="gender_id" name="gender_id"
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
                            <select wire:model.defer="user.department_id" id="department_id" name="department_id"
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
                            <select wire:model.defer="user.role_id" id="role_id" name="role_id"
                                    class="w-full text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">-- choose role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('user.role_id')" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input wire:model.defer="password" id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input wire:model.defer="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                    </div>

                    <div class="mt-4 ml-auto">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">
                            Save
                        </button>
                        <button wire:click.prevent="$set('showModal', false)" class="px-4 py-2 font-bold text-white bg-gray-500 rounded" type="button" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
