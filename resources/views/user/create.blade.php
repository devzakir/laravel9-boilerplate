<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <div class="flex justify-between items-center p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <h2>Create User</h2>
                    <a href="{{ route('users.index') }}" class="mt-1 text-sm font-normal px-3 py-1 rounded bg-blue-600 text-white"> All User </a>
                </div>
                <form class="p-5 lg:max-w-4xl mx-auto dropzone" action="{{ route('users.store') }}" method="POST">
                    <div class="flex gap-6 flex-wrap md:flex-nowrap">
                        <div class="w-1/2 mx-auto">
                            @csrf
                            <div class="mb-6">
                                <label for="userName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Name</label>
                                <input type="text" id="userName" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter User name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-red-500 text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="userEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Email</label>
                                <input type="email" id="userEmail" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter User email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-red-500 text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="userPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Password </label>
                                <input type="password" id="userPassword" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter User password" >
                                @error('password')
                                    <div class="text-red-500 text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Confirm Password </label>
                                <input type="password" id="confirmPassword" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter confirm password" >
                                @error('password_confirmation')
                                    <div class="text-red-500 text-sm font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Status </label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-license" checked type="radio" value="1" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-license" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Active </label>
                                        </div>
                                    </li>
                                    <li class="w-full dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-passport" type="radio" value="0" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-passport" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Inactive</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="mb-6">
                                <label for="userRole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"> Select User role </label>
                                <select id="userRole" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
