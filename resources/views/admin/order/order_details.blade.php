@extends('admin_layouts')
@section('admin_content')
@section('title','Order Details')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   Order Details
                </div>
                <hr>
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">invoice no: {{$order->invoice_no}}</div>
                        <div class="col-md-3">customer name: {{$order->customer_name}}</div>
                        <div class="col-md-3"><strong style="color:red">address: {{$order->address}}</strong></div>
                        <div class="col-md-3"><strong style="color:red">phone number: {{$order->phone_number}}</strong></div>
                    </div>
                    <div class="row">
                        @if($order->coupon_code)
                        <div class="col-md-3">coupon code: {{$order->coupon_code}}</div>
                        @else
                        <div class="col-md-3">coupon code: Null</div>
                        @endif
                        @if($order->discount_amount)
                        <div class="col-md-3">discount amount: {{$order->discount_amount}}Tk</div>
                        @else
                        <div class="col-md-3">discount amount: 0 Taka</div>
                        @endif
                        <div class="col-md-3">subtotal : {{$order->subtotal}} Taka</div>
                        <div class="col-md-3">total : {{$order->total}} Taka</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Product Name</th>
                                <th>quantity</th>
                                <th>single price</th>
                                <th>subtotal price</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_details as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->product_quantity}}</td>
                                <td>{{$row->single_price}}</td>
                                <td>{{$row->subtotal_price}}</td>             
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
//active start

    $(document).on('click','.Pending',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/Order/Pending')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table-responsive').load(location.href+' .table-responsive')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'order Pending...... '
                })
            }
        }
    });
});






 $(document).on('click','.order_done',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/Order/order_done')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table-responsive').load(location.href+' .table-responsive')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'order done....'
                })
            }
        }
    });
});

</script>

@endsection