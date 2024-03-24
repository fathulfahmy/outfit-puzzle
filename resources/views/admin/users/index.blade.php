<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">

        <a href="{{ route('admin.users.create') }}">
            <x-primary-button>{{ __('Create New User') }}</x-primary-button>
        </a>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-auto text-left rtl:text-right">
                    <thead class="uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email verified at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-gray-50 text-start">
                                <td class="px-6 py-4">
                                    {{ $user->id }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($user->hasRole('admin'))
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">
                                    Created at {{ $user->created_at }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($user->email_verified_at != null)
                                        Verified at {{ $user->email_verified_at }}
                                    @else
                                        Not verified
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="mt-4">
                                        <a href="{{ route('admin.users.edit', $user) }}">
                                            <x-primary-button
                                                class="w-full bg-blue-900">{{ __('Edit') }}</x-primary-button>
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <div class="max-w-xl">
                                            @include('admin.users.partials.delete-user-form')
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
