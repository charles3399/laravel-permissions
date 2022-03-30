<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

    <div class="my-3 mx-auto flex justify-center">
        <a href="{{route('usersroles.create')}}" class="px-2 py-2 my-5 mr-10 bg-indigo-700 text-white rounded-lg">Create a new user</a>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-sm text-black">Full Name</th>
                                <th class="px-4 py-2 text-sm text-black">Email Address</th>
                                <th class="px-4 py-2 text-sm text-black">Role</th>
                                <th class="px-4 py-2 text-sm text-black">Nominated Password</th>
                                <th class="px-4 py-2 text-sm text-black">Confirmed Password</th>
                                <th class="px-4 py-2 text-sm text-black">Edit</th>
                                <th class="px-4 py-2 text-sm text-black">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($usersRoles as $user)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-black"><a href="{{route('usersroles.show', $user->id)}}" class="hover:text-green-400">{{$user->full_name}}</a></td>
                                <td class="px-6 py-4 text-sm text-black">{{$user->email_address}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$user->role->role_name}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$user->nominated_password}}</td>
                                <td class="px-6 py-4 text-sm text-black">{{$user->confirmed_password}}</td>
                                <td class="px-1 py-1 text-sm text-black">
                                    <a href="{{route('usersroles.edit', $user->id)}}" class="px-2 py-1 rounded-md text-white bg-green-600">Edit</a>
                                </td>
                                <form action="{{route('usersroles.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td class="px-1 py-1 text-sm text-black">
                                        <button type="submit" class="px-2 py-1 rounded-md text-white bg-red-600">Delete</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>