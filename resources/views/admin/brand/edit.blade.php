@extends('admin_layouts')
@section('admin_content')
@section('title','edit brand')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit brand
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
                <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="brand_name" name="brand_name" value="{{$brand->brand_name}}" type="text" placeholder="Brand Name" />
                                <label for="inputFirstName">brand Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-group col-lg-4">
                                    <label>Select new Logo</label>
                                    <input type="file" name="logo">
                                    <br>
                                    <img src="{{URL::to($brand->logo)}}"style="width: 200px;height: 150px;">
                                    <input type="hidden" name="old_image" value="{{$brand->logo}}">
                                </div> 
                            </div>
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