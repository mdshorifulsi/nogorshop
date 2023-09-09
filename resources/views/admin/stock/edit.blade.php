@extends('admin_layouts')
@section('admin_content')
@section('title','Edit stock')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Stock
                    
                </div>
                <br>
                <form action="{{route('stock.update',$stock->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="stock_quantity" name="stock_quantity" value="{{$stock->stock_quantity}}" type="text" placeholder="Category Name" />
                                <label for="inputFirstName">stock quantity</label>
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