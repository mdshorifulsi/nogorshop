@extends('admin_layouts')
@section('admin_content')
@section('title','Edit subcategory')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit subcategory
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
                <br>
                <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                           <label>Category Name</label>
                           <select class="form-control" name="category_id">
                            <option>Select Category Name</option>
                            @foreach($category as $row)
                            <option 
                            <?php
                            if($row->id==$subcategory->category_id)
                                echo "selected";
                            ?>
                            value="{{$row->id}}">{{$row->cat_name}}</option>
                            @endforeach
                        </select>
                        </div>

                      
                     
                    </div>

                    <div class="row mb-3">
                       
                             <div class="col-md-6">
                           <label for="inputFirstName">subcatategory name</label>
                                <input class="form-control" id="subcat_name" name="subcat_name" value="{{$subcategory->subcat_name}}" type="text" placeholder="subcatategory name" />
                                
                            </div>
                        </div>
                     

                   


                  
                    <div class="card-footer">
                        <button type="reset" id="reset" class="btn btn-danger" value="Reset">reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection