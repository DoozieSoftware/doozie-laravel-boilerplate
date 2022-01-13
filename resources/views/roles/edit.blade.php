<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            

<div class="md:mt-0 md:col-span-2">
    <form action="{{route('roles.update', $role->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <div class="shadow overflow-hidden sm:rounded-md w-full mx-auto">
            <div class="px-4 py-4 bg-white sm:p-6">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                </div>
              @endif

                <div class="grid grid-cols-6 gap-6">



                    <div class="col-span-6 sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <input type="text" value="{{$role->name}}"  name="name" id="name"
                             autocomplete="given-name" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                      
                    </div>


                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="role" class="block text-sm font-medium text-gray-700">Permission</label>
                        
                            {{-- @foreach ($permission as $value)
                                <label> <input type="checkbox" name="permission[]"  id=""> {{$value->name}}</label>
                                <br>
                            @endforeach --}}
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach
                            
                    </div>

               



                </div>
                
                  

              
           
            <div class="px-4 py-3 mt-2 bg-gray-50 text-right sm:px-6">

                <button type="submit"
                    class="inline-flex justify-center py-2 px-14 border border-transparent shadow-sm text-sm font-semibold rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>



                <a href="{{ URL::previous() }}">
                    <button type="button"
                        class="inline-flex justify-center py-2 px-14 border border-transparent shadow-sm text-sm font-semibold rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Back
                    </button>
                </a>
            </div>
        </div>
    </form>
</div>

        </div>
    </div>
</div>

</x-app-layout>