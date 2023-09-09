@extends('admin_layouts')
@section('admin_content')
@section('title','Add slider')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add slider

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
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="slider_title" name="slider_title" type="text" placeholder="slider_title" />
                                <label for="inputFirstName">slider title</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="slider_subtitle" name="slider_subtitle" type="text" placeholder="slider_subtitle" />
                                <label for="inputFirstName">Slider subtitle (optional)</label>
                            </div>
                        </div>      
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-group col-lg-4">
                                    <label>Select Slider Image</label>
                                    <input type="file" name="slider_image">
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