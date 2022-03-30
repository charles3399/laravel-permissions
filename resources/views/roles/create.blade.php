<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Role
        </h2>
    </x-slot>

    <div class="my-3 mx-auto flex justify-center">
        <a href="{{route('roles.index')}}" class="px-2 py-2 my-5 mr-10 bg-green-700 text-white rounded-lg">Roles dashboard</a>
    </div>

    <div class="my-3 max-w-3xl sm:px-6 lg:px-8 mx-auto flex justify-center bg-red-400 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-800 py-2 my-3 font-bold">{{$error}}</li>
            @endforeach
        </ul>
    </div>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('roles.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="my-2">
                            <label for="role_name" class="block mb-2">Role Name: </label>
                            <input type="text" name="role_name" class="my-4 px-3 py-2 rounded-md w-full" placeholder="Role name">
                        </div>
                        <div class="my-2">
                            <textarea name="description" id="description" cols="20" rows="5" class="my-4 px-3 py-2 rounded-md w-full" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="px-2 py-2 rounded-lg bg-green-600 text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>