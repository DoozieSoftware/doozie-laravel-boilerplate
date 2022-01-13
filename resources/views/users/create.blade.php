<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

<div class="md:mt-0 md:col-span-2">
    <form action="{{route('users.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('post')
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
                        <input type="text"  name="name" id="name"
                             autocomplete="given-name" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                      
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email"  name="email" id="email" 
                            autocomplete="family-name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                       
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password"  name="password" id="password" 
                            autocomplete="family-name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                       
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password"  name="confirm-password" id="confirm-password" 
                            autocomplete="family-name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                       
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role" autocomplete="role"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                            @foreach ($roles as $r)
                                <option>{{$r}}</option>
                            @endforeach
                            
                        </select>
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