<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Management') }}
        </h2>
    </x-slot>


    <div class="flex flex-col py-12">

        <div id="add-btn">
            @can('role-create')
            <a href="{{ route('roles.create') }}">
                <button type="button"
                    class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-700 shadow mr-5 mb-3"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
                    Create New Role
                </button>
            </a>
            @endcan

            {{-- <button class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-700 shadow mr-5 mb-3"
                style="float: right">Add</button> --}}
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                    Name
                                </th>
                                @can('role-edit')
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($roles as $role)
                            <tr>
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $role->name }}</td>
                                
                                @can('role-edit')
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap ">
                                    {{-- <a href="{{ route('users.show',$role->id) }}"><button
                                            class="text-white px-2 py-1 rounded bg-indigo-500 hover:bg-indigo-700 shadow-sm">Show</button></a>
                                    --}}
                                    @can('role-edit')
                                    <a href="{{ route('roles.edit',$role->id) }}"><button
                                            class="text-white px-2 py-1 rounded bg-blue-500 hover:bg-blue-700 shadow-sm">Edit</button></a>
                                    @endcan

                                    @can('role-delete')
                                    <form action="{{route('roles.destroy',$role->id)}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white px-2 py-1 rounded bg-red-500 hover:bg-red-700 shadow-sm">Delete</button>
                                    </form>
                            
                                    @endcan
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>


    {!! $roles->render() !!}

</x-app-layout>