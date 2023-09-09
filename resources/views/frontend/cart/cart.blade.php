@extends('layouts')
@section('content')
@section('title','cart')
<main class="main">
      
<section class="mt-50 mb-50">
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table shopping-summery text-center clean">
                <thead>
                    <tr class="main-heading">
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($content as $row)
                    <tr>
                        <td class="image product-thumbnail"><img src="{{($row->options->image)}}" alt="#"></td>

                        <td class="product-des product-name">
                            <h5 class="product-name"><a href="product-details.html"> {{$row->name}}</a></h5>
                            
                        </td>
                        <td class="price" data-title="Price"><span>{{$row->price}} Tk.</span></td>

                        <td >
                            <div class="detail-qty  radius  m-auto">
                                

                            <input type="number" id="qty" class="qty" name="qty" style="min-width: 70px;" data-id={{$row->rowId}} value="{{$row->qty}}" min="1" required="">
                           

                               
                            </div>
                        </td>

                     
                        <td class="text-right" data-title="Cart">
                            <span>{{$row->qty*$row->price}} Tk.</span>
                        </td>

                        <td class="action" data-title="Remove"><a href="#" id="removeproduct" data-id="{{$row->rowId}}" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
       

        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
       
    </div>

<div class="row mb-50">
<div class="col-lg-6 col-md-12">


</div>
    <div class="col-lg-6 col-md-12">
        <div class="border p-md-4 p-30 border-radius cart-totals">
            <div class="heading_s1 mb-3">
                <h4>Cart Totals</h4>
            </div>
            <div class="table-responsive">
    <table class="table">
        <tbody>
           
            <tr>
                <td class="cart_total_label">Cart Subtotal</td>
                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{Cart::subtotal()}} Tk</span></td>
            </tr>
           
            <tr>
                <td class="cart_total_label">Shipping</td>
                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
            </tr>

           
            <tr>
                <td class="cart_total_label">Total</td>
                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> {{Cart::total()}} Tk</td>
            </tr>
            
        

            </tr>  
          
        </tbody>
    </table>
        </div>
    <a href="{{route('home')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>  shiping continue</a>

    <a href="{{route('checkout')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> CheckOut </a>
</div>
</div>
</div>


</div>
</div>
</section>
    </main>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

{{-- Toster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


//cart remove start
    $(document).on('click','#removeproduct',function(e){
            e.preventDefault();

             let id=$(this).data('id');
            // alert(rowId);

             $.ajax({

                url:'{{url('/cartremoveproduct')}}/'+id,
                type:"get",
                async:false,
             
                success:function(response){
                	location.reload();

                    // toster message
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
  icon: 'error',
  title: 'Product remove success'
});
     //end toster


                },


});


});

//cart remove end

// qty inc/dec start

    $(document).on('click','#qty',function(e){
            e.preventDefault();

             let qty=$(this).val();
             let rowId=$(this).data('id');
            
            //alert(rowId);

             $.ajax({

                url:'{{url('/cartUpdate')}}/'+rowId+'/'+qty,
                type:"get",
                async:false,
             
                success:function(response){
                    location.reload();

                                        // toster message
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
  title: 'Product quantity updated'
});
     //end toster

                },


            });
           




});
</script>




@endsection