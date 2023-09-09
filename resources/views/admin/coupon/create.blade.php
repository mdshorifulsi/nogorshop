@extends('admin_layouts')
@section('admin_content')
@section('title','Add Coupon')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add Coupon
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
                <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="coupon_code" name="coupon_code" type="text" placeholder="coupon Code" />
                                <label for="inputFirstName">coupon Code</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="discount" name="discount" type="text" placeholder="coupon Dicount" />
                                <label for="inputFirstName">coupon Dicount</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="valid_date" name="valid_date" type="date" placeholder="valid date" />
                                <label for="inputFirstName">valid date</label>
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