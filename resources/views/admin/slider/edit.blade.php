@extends('admin_layouts')
@section('admin_content')
@section('title','Edit slider')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit slider
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
                <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="slider_title" name="slider_title" value="{{$slider->slider_title}}" type="text" placeholder="slider_title" />
                                <label for="inputFirstName">slider title</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="slider_subtitle" name="slider_subtitle" value="{{$slider->slider_subtitle}}" type="text" placeholder="slider_subtitle" />
                                <label for="inputFirstName">Slider subtitle</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="form-group col-lg-4">
                                    <label>Select Slider Image</label>
                                    <input type="file" name="slider_image">
                                     <br>
                                    <img src="{{URL::to($slider->slider_image)}}"style="width: 200px;height: 150px;">
                                    <input type="hidden" name="old_image" value="{{$slider->logo}}">
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