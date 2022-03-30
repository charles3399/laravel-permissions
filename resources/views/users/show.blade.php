<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User: {{$usersRoles->full_name}}
        </h2>
    </x-slot>

    <div class="my-3 mx-auto flex justify-center">
        <a href="{{route('usersroles.create')}}" class="px-2 py-2 my-5 mr-10 bg-indigo-700 text-white rounded-lg">Create a new role</a>
        <a href="{{route('usersroles.index')}}" class="px-2 py-2 my-5 mr-10 bg-green-700 text-white rounded-lg">Roles dashboard</a>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-sm text-black">Full Name</th>
                                <th class="px-4 py-2 text-sm text-black">Email</th>
                                <th class="px-4 py-2 text-sm text-black">Role</th>
                                <th class="px-4 py-2 text-sm text-black">Nominated Password</th>
                                <th class="px-4 py-2 text-sm text-black">Confirmed Password</th>
                                <th class="px-4 py-2 text-sm text-black">Options</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-black">{{$usersRoles->full_name}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$usersRoles->email_address}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$usersRoles->role->role_name}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$usersRoles->nominated_password}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$usersRoles->confirmed_password}}</td>
                                <td class="px-6 py-4 text-sm text-black">
                                    <a href="{{route('usersroles.edit', $usersRoles->id)}}" class="px-2 py-1 rounded-md text-white bg-green-600">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>