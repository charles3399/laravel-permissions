<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit for: {{$usersRoles->full_name}}
        </h2>
    </x-slot>

    <div class="my-3 mx-auto flex justify-center">
        <a href="{{route('usersroles.index')}}" class="px-2 py-2 my-5 mr-10 bg-green-700 text-white rounded-lg">Users dashboard</a>
    </div>

    <div class="my-3 max-w-3xl sm:px-6 lg:px-8 mx-auto flex justify-center bg-red-400 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-800 py-2 my-3 font-bold">{{$error}}</li>
            @endforeach
        </ul>
    </div>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('usersroles.update', $usersRoles->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="my-2">
                            <input type="text" name="full_name" class="my-4 px-3 py-2 rounded-md" placeholder="Role name" value="{{$usersRoles->full_name}}">
                        </div>
                        <div class="my-2">
                            <label for="email_address">Email: </label>
                            <input type="text" name="email_address" class="my-4 px-3 py-2 rounded-md" placeholder="sample@gmail.com" value="{{$usersRoles->email_address}}">
                        </div>
                        <div class="my-2">
                            <label for="role_id">Role: </label>
                            <select name="role_id" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}"

                                        @if (@isset($usersRoles))
                                            @if ($role->id == $usersRoles->role_id)
                                                selected
                                            @endif
                                        @endif

                                        >
                                        {{$role->role_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <label for="nominated_password">Nominated Password: </label>
                            <input type="password" name="nominated_password" class="my-4 px-3 py-2 rounded-md" value="{{$usersRoles->nominated_password}}">
                        </div>
                        <div class="my-2">
                            <label for="confirmed_password">Confirmed Password: </label>
                            <input type="password" name="confirmed_password" class="my-4 px-3 py-2 rounded-md" value="{{$usersRoles->confirmed_password}}">
                        </div>
                        <button type="submit" class="px-2 py-2 rounded-lg bg-green-700 text-white">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>