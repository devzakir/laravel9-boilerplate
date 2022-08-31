<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <h2 class="">All Roles
                        <span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5">10</span>
                    </h2>
                    <a href="{{ route('roles.create') }}">
                        <button type="button"
                            class="text-white bg-blue-500 hover:bg-blue-400 font-bold focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Create Role
                        </button>
                    </a>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                SL.
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Permissions
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6">1</th>
                            <th scope="row" class="py-4 px-6">
                                Create Post
                            </th>
                            <th class="py-4 px-6">
                                <button id="show-per-icon" onclick="permissionShow('show', '')" type="button"
                                    data-tooltip-target="show-button" data-bs-toggle="tooltip" data-bs-placement="top">
                                    <x-svg.eye class="w-6 h-6 text-pink-400" />
                                </button>
                                <button class="hidden" id="hide-per-icon" onclick="permissionShow('hide', '')"
                                    type="button" data-tooltip-target="hide-button" data-bs-toggle="tooltip"
                                    data-bs-placement="top">
                                    <x-svg.eye-off class="w-6 h-6 text-pink-400" />
                                </button>
                                <div id="permission" class="hidden grid grid-cols-6 gap-1 text-center">
                                    <div class="bg-green-500 text-white p-1 rounded font-bold">
                                        hello
                                    </div>
                                </div>
                            </th>
                            <td class="py-4 px-6 flex gap-2">
                                <a data-tooltip-target="edit-button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    href="">
                                    <x-svg.edit class="w-6 h-6 text-green-400" />
                                </a>
                                <form action="" method="POST" class="d-inline">
                                    <button data-tooltip-target="delete-button" data-bs-toggle="tooltip"
                                        data-bs-placement="top">
                                        <x-svg.trash class="w-6 h-6 text-red-400" />
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" class="text-center pt-8">Nothing Found.</td>
                        </tr>
                    </tbody>
                </table>
                <div class="p-5">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function PermissionShow(param, id) {
        if (param === 'show') {
            $('#permission' + id).removeClass('hidden');
            $('#show-per-icon' + id).addClass('hidden');
            $('#hide-per-icon' + id).removeClass('hidden');
        } else {
            $('#permission' + id).addClass('hidden');
            $('#show-per-icon' + id).removeClass('hidden');
            $('#hide-per-icon' + id).addClass('hidden');
        }
    }
</script>
