<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles
        </h2>
    </x-slot>

    <div class="my-3 mx-auto flex justify-center">
        <a href="{{route('roles.create')}}" class="px-2 py-2 my-5 mr-10 bg-indigo-700 text-white rounded-lg">Create a new role</a>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-sm text-black">Role Name</th>
                                <th class="px-4 py-2 text-sm text-black">Description</th>
                                <th class="px-4 py-2 text-sm text-black">Edit</th>
                                <th class="px-4 py-2 text-sm text-black">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($roles as $role)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-black"><a href="{{route('roles.show', $role->id)}}" class="hover:text-green-400">{{$role->role_name}}</a></td>
                                <td class="px-6 py-4 text-sm text-black">{{$role->description}}</td>
                                <td class="px-1 py-1 text-sm text-black">
                                    <a href="{{route('roles.edit', $role->id)}}" class="px-2 py-1 rounded-md text-white bg-green-600">Edit</a>
                                </td>
                                <form action="{{route('roles.destroy', $role->id)}}" method="post">
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