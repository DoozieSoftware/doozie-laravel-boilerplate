<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                <a class="btn btn-danger" href="{{ route('users.edit',$user->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table> --}}


    <div class="flex flex-col py-12">

        <div id="add-btn">
            @can('user-create')
            <a href="{{ route('users.create') }}">
                <button type="button"
                    class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-700 shadow mr-5 mb-3"
                    data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
                    Create New User
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
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                    Roles
                                </th>
                                @can('user-edit')
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($data as $user)
                            <tr>
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label >{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                @can('user-edit')
                                <td class="px-6 py-4 text-gray-500 whitespace-nowrap ">
                                    {{-- <a href="{{ route('users.show',$user->id) }}"><button class="text-white px-2 py-1 rounded bg-indigo-500 hover:bg-indigo-700 shadow-sm"
                                        >Show</button></a> --}}
                                    @can('user-edit')
                                    <a href="{{ route('users.edit',$user->id) }}"><button class="text-white px-2 py-1 rounded bg-blue-500 hover:bg-blue-700 shadow-sm"
                                        >Edit</button></a>
                                        @endcan

                                        @can('user-delete')
                                        <form action="{{route('users.destroy',$user->id)}}" method="POST" style="display: inline;">
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


    {!! $data->render() !!}

</x-app-layout>