<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Audit Trails') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-hidden overflow-x-auto mb-4 min-w-full align-middle sm:rounded-md">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Name</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Action</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Field</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Old Value</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">New Value</span>
                                </th>
                                <th class="px-6 py-3 w-32 text-left bg-gray-50">
                                    <span class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase">Audited At</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($auditTrails as $auditTrail)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $auditTrail->user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ toReadableString($auditTrail->action) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ toReadableString($auditTrail->field) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        @if(str_ends_with($auditTrail->field, '_id'))
                                            {{ $auditTrail->oldValue?->name }}
                                        @else
                                            {{ $auditTrail->old_value_id }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        @if(str_ends_with($auditTrail->field, '_id'))
                                            {{ $auditTrail->newValue?->name }}
                                        @else
                                            {{ $auditTrail->new_value_id }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $auditTrail->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

{{--                    {{ $auditTrails->links() }}--}}

                </div>
            </div>
        </div>
    </div>
</div>
