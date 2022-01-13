<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="flex flex-col py-12">

        <div id="add-btn" >
            <!-- Button trigger modal -->
<button type="button" class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-700 shadow mr-5 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
    Add
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post"  action="{{ route('storeCategory') }}" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                      <label for="floatingInput">Name</label>
                      <input type="Name" class="form-control" name="category_name" id="catname" placeholder="Category Name" required>
                  </div>
                  <div class="mb-3">
                      <label for="floatingPassword">Description</label>
                      <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                  </div>
                  <div class="mb-3">
                    <label>Thumbnail</label>
                    <input type="file" accept="image/*" name="thumbnail" id="thumbnail" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>File Attachment</label>
                    <input type="file" accept=
                    "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="file_attachment" id="file_attachment" class="form-control">
                  </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
      </form>  
      </div>
    </div>
  </div>

            {{-- <button class="text-white px-4 py-2 rounded bg-green-500 hover:bg-green-700 shadow mr-5 mb-3" style="float: right">Add</button> --}}
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                      Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                      Description
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                      Thumbnail
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                      File Attachment
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                        Action
                      </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
             
                  @foreach ($category as $cat)
                  <tr>
                      <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $cat->name }}</td>
                      <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $cat->description }}</td>
                      <td class="px-6 py-4 text-gray-500 whitespace-nowrap"><img src="{{$cat->getFirstMediaUrl('thumbnail', 'thumb')}}"  width="60" height="60"></td>
                      <td class="px-6 py-4 text-gray-500 whitespace-nowrap"><img src="{{ $cat->file_attachment }}"  width="60" height="60"></td>
                      <td class="px-6 py-4 text-gray-500 whitespace-nowrap ">
                        <button class="text-white px-2 py-1 rounded bg-blue-500 hover:bg-blue-700 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2"  onclick="editCategory('{{$cat->id}}')">Edit</button>
                        <a href="category/delete/{{$cat->id}}"><button class="text-white px-2 py-1 rounded bg-red-500 hover:bg-red-700 shadow-sm">Delete</button></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post"  action="{{ route('updateCategory') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" id="cat_id" name="cat_id">
                  <div class="mb-3">
                      <label for="floatingInput">Name</label>
                      <input type="Name" class="form-control" name="new_category_name" id="new_category_name" placeholder="Category Name" required>
                  </div>
                  <div class="mb-3">
                      <label for="floatingPassword">Description</label>
                      <input type="text" class="form-control" name="new_description" id="new_description" placeholder="Description">
                  </div>
                  <div class="mb-3">
                    <label>Thumbnail</label>
                    <input type="file" accept="image/*" name="new_thumbnail" id="new_thumbnail" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>File Attachment</label>
                    <input type="file" accept=
                    "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="new_file_attachment" id="new_file_attachment" class="form-control">
                  </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
      </form>  
      </div>
    </div>
  </div>

            </div>
          </div>
        </div>
      </div>

      <script>
              function editCategory(id) {
        $('#cat_id').val(id);

        console.log(id, 8989);
        $.ajax({
          type: 'GET',
          url: '{{URL::route("editCategory")}}',
          dataType: 'json',
          data: { id: id },
        }).done(function (result1) {
          console.log(result1, 4334);
          result = result1['categoryDetails'];
          console.log(result, 6969);
          if (result) {
            $('#new_category_name').val(result['name']);
            $('#new_description').val(result['description']);

            $('#cat_id').val(id);
            $('#exampleModal1').modal('show');
          } 
        });
      }
      </script>
    
</x-app-layout>