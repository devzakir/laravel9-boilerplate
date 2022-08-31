<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-6 flex-wrap lg:flex-nowrap w-full mb-6">
                <a href="{{ route('users.index', ['type' => 'customer']) }}" class="hover:bg-gray-50 shadow-sm flex items-center w-64 flex-grow gap-4 p-6 bg-white border border-gray-100 dark:bg-gray-800 dark:border-gray-800 rounded-lg">
                    <span class="p-3 text-blue-600 bg-blue-100 dark:bg-blue-500/20 rounded-full">
                        <x-svg.users />
                    </span>
                    <div>
                        <p class="text-2xl font-medium text-gray-900 dark:text-gray-300">{{ $userData['customers'] }}</p>
                        <p class="text-sm text-gray-400">Total Customer</p>
                    </div>
                </a>
                <a href="{{ route('users.index', ['type' => 'staff']) }}" :active="request()->routeIs('users.*')" class="hover:bg-gray-50 shadow-sm flex items-center w-64 flex-grow gap-4 p-6 bg-white border border-gray-100 dark:bg-gray-800 dark:border-gray-800 rounded-lg">
                    <span class="p-3 text-blue-600 bg-blue-100 dark:bg-blue-500/20 rounded-full">
                        <x-svg.user />
                    </span>
                    <div>
                        <p class="text-2xl font-medium text-gray-900 dark:text-gray-300">{{ $userData['admin'] }}</p>
                        <p class="text-sm text-gray-400">Total Staff</p>
                    </div>
                </a>
                <a href="{{ route('roles.index') }}" :active="request()->routeIs('roles.*')" class="hover:bg-gray-50 shadow-sm flex items-center w-64 flex-grow gap-4 p-6 bg-white border border-gray-100 dark:bg-gray-800 dark:border-gray-800 rounded-lg">
                    <span class="p-3 text-blue-600 bg-blue-100 dark:bg-blue-500/20 rounded-full">
                        <x-svg.unlock />
                    </span>
                    <div>
                        <p class="text-2xl font-medium text-gray-900 dark:text-gray-300">37</p>
                        <p class="text-sm text-gray-400">User Roles</p>
                    </div>
                </a>
                <a href="{{ route('users.index', ['status' => 'inactive']) }}" :active="request()->routeIs('users.*')" class="hover:bg-gray-50 shadow-sm flex items-center w-64 flex-grow gap-4 p-6 bg-white border border-gray-100 dark:bg-gray-800 dark:border-gray-800 rounded-lg">
                    <span class="p-3 text-blue-600 bg-blue-100 dark:bg-blue-500/20 rounded-full">
                        <x-svg.deactivate-user />
                    </span>
                    <div>
                        <p class="text-2xl font-medium text-gray-900 dark:text-gray-300">{{ $userData['inactive'] }}</p>
                        <p class="text-sm text-gray-400">Deactivate User</p>
                    </div>
                </a>
            </div>
            <div class="flex rounded-lg mb-4 justify-between items-center py-2 px-6 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h2 class="">All User
                    <span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5">{{ $users->total() }}</span>
                </h2>
                <a href="{{ route('users.create') }}">
                    <button type="button"
                        class="text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Create User
                    </button>
                </a>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Role
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Created at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="{{ $user->image_url }}"
                                        alt="Jese image">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">{{ $user->name }}</div>
                                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                    </div>
                                </th>
                                <td class="py-4 px-6">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800"> Default </span>
                                </td>
                                <td class="py-4 px-6">
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        @if($user->status)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                        @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> Inactive
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6 flex gap-2">
                                    <a data-tooltip-target="edit-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" href="{{ route('users.edit', $user->id) }}">
                                        <x-svg.edit class="w-6 h-6 text-green-400" />
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button data-tooltip-target="delete-button" data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <x-svg.trash class="w-6 h-6 text-red-400" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center pt-8">Nothing Found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="p-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
