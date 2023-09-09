@extends('admin_layouts')
@section('admin_content')
@section('title','All subcategory')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br>
            <div class="card-header">
                <button type="button" class="btn btn-warning"><a href="{{route('subcategory.create')}}"> + Add subcategory </a></button>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    ALL subcategory
                </div>
                <div class="card-body">
                    <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>category name</th>
                                <th>subcat name</th>
                                <th>subcat_slug </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategory as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->cat_name }}</td>
                                <td>{{$row->subcat_name}}</td>
                                <td>{{$row->subcat_slug}}</td>
                                
                                
                                <td>
                                   
                                    
                                    <a href="{{route('subcategory.edit',$row->id)}}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <button class="btn btn-danger" type="button" onclick="deleteSubcat({{ $row->id }})"><i class="bi bi-trash"></i></button>
                                      <form id="delete-form-{{$row->id}}" action="{{route('subcategory.delete',$row->id)}}"  method="PUT" style="display: none ; " >
                                      @csrf
                                      @method('DELETE')
                                      </form>

                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>

 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

{{-- Toster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
 //category delete start
   function deleteSubcat(id){
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        event.preventDefault();
        document.getElementById('delete-form-'+id).submit();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
          )}
          })
          }
          //category delete end

    </script>

{{-- toster message --}}

    @if(Session::has('message'))

        <script>
            toastr.options={
                "progressBar":  true,
                "closeButton":  true,
                
            }
            toastr.success("{{Session::get('message')}}");

        </script>
    @endif

@endsection