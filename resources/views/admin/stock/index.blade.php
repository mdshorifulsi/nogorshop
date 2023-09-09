@extends('admin_layouts')
@section('admin_content')
@section('title','Stock')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br>
            <div class="card-header">
               
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    ALL Stock
                </div>
                <div class="card-body">
                    <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>name</th>
                                 <th>Image</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>purchase</th>
                                <th>selling </th>
                                <th>weight</th>
                                 <th>stock</th>
                                 <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>
                                    <img class="rounded float-start" src="{{ asset($row->product_image) }}"  width="100px">
                                </td>
                                <td>{{$row->category->cat_name}}</td>
                                <td>{{$row->brand->brand_name}}</td>
                                <td>{{$row->purchase_price}}Tk.</td>
                                <td>{{$row->selling_price}}Tk.</td>     
                                <td>{{$row->weight}}Kg</td>
                                <td>{{$row->stock_quantity}}</td>
                                <td>
                                    @if($row->stock_quantity>0)
                                    <span class="badge text-bg-success">Available</span>
                                    @else
                                    <span class="badge text-bg-danger">Stockout</span>
                                    @endif
                                </td>
                                
                              
                                <td>
                                   
                                    <a href="{{route('stock.edit',$row->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    
                                    
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


{{-- Toster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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