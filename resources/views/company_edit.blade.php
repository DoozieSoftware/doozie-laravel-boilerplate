<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    <div class="md:mt-0 md:col-span-2">
        <form action="/company/{{ $company->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="transport_array" id="transport_array">
            <input type="hidden" name="bank_array" id="bank_array">
            <div class="shadow overflow-hidden sm:rounded-md w-full mx-auto">
                <div class="px-4 py-4 bg-white sm:p-6">

                   

                    <div class="grid grid-cols-6 gap-6">



                        <div class="col-span-6 sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Company Name </label>
                            <input type="text" value="{{$company->name}}" name="name" id="name"
                                 autocomplete="given-name" required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                          
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" value="{{$company->email}}" name="email" id="email" 
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                           
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Phone No</label>
                            <input type="number" value="{{$company->phone_no}}" name="phone_no" id="email-address" 
                                autocomplete="email"
                                class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >
                        </div>


                        <div class="col-span-6 sm:col-span-2">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="text" value="{{$company->website}}" name="website" id="website"
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >


                        </div>

                        
                        <div class="col-span-6 sm:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea type="number"  name="address" id="address"
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >{{$company->address}}</textarea>


                        </div>
                       

                        
                        <div class="col-span-6 sm:col-span-2 lg:col-span-2">
                            <label for="abbrevation" class="block text-sm font-medium text-gray-700">Abbrevation</label>
                            <input type="text" value="{{$company->abbrevation}}"  name="abbrevation" id="abbrevation"
                                autocomplete="address-level1"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <select id="country" value="{{$company->country}}" name="country" autocomplete="country"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >

                                <option selected >India</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                            <select id="state" value="{{$company->state}}" name="state" autocomplete="state"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >

                                <option selected >Karnataka</option>
                            </select>
                        </div>

                        
                        <div class="col-span-6 sm:col-span-2">
                            <label for="pan_number" class="block text-sm font-medium text-gray-700">PAN
                                Number</label>
                            <input type="text" value="{{$company->pan_number}}" name="pan_number" id="pan_number"
                                 autocomplete="email"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >

                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="gst_number" class="block text-sm font-medium text-gray-700">GST
                                Number</label>
                            <input type="text" value="{{$company->gst_number}}" name="gst_number" id="gst_number"
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                style="text-transform:uppercase" >

                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                            <input type="file" name="logo" id="logo"
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >

                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="certificate" class="block text-sm font-medium text-gray-700">Certificate</label>
                            <input type="file" name="certificate" id="certificate"
                                autocomplete="family-name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >

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