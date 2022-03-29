<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-center gap-6">
                    <a href="{{route('roles.index')}}" class="bg-green-600 px-3 py-3 rounded-md text-white">View Roles</a>
                    <a href="{{route('usersroles.index')}}" class="bg-blue-600 px-3 py-3 rounded-md text-white">View Users</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
