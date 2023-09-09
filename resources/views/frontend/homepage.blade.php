@extends('layouts')
@section('content')
@section('title','Home page')

 <div class="row">
     <div class="col-md-3">
<section >
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div id="newoffer">Best Offer product</div>
                            @php
                                $offerproduct=App\Models\Product::where('offers',1)
                                ->take(3)->get();
                            @endphp
                            @foreach($offerproduct as $v_offerproduct)
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset($v_offerproduct->product_image)}}" alt="#">
                                </div>
                                 
                                
                                <div class="content pt-10">
                                    <h5>{{$v_offerproduct->product_name}}</h5>

                                    <h5>{{$v_offerproduct->selling_price-$v_offerproduct->discount_price}} Tk</h5>
                                   
                                    
                                     
                                    <button type="submit" title="add to Cart"  class="btn btn-sm addToCart"  
                                         data-id="{{$v_offerproduct->id}}"
                                          @if($v_offerproduct->discount_price==Null)
                                          data-price="{{$v_offerproduct->selling_price}}"
                                          @else
                                          data-price="{{$v_offerproduct->selling_price-$v_offerproduct->discount_price}}"
                                        @endif
                                            ><i class="fi-rs-shopping-bag-add ">
                                            <span class="loading d-none">...</span></i></button>
                                    


                                </div>
                                

                            </div>
                          @endforeach
                         
                        </div>   
        </section>
    </div>


    
     <div class="col-md-9">
        <section class="home-slider">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach($slider as $v_slider)
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{asset($v_slider->slider_image)}}" width="1500px" height="400px"alt="">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            
        </section>
    </div>
</div>
       

        
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
           
            <div class="container">
               <h3 class="section-title mb-20 wow fadeIn animated"><span> All Products </span> </h3>
                <!--End nav-tabs-->
                <form action="" id="addToCartForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">

                        

                        <div class="row product-grid-4">
                            @foreach($product as $v_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            
                                                <img class="default-img" src="{{asset($v_product->product_image)}}" height="150px" width="100px" alt="">
                                                
                                            
                                        </div>              
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($v_product->discount_price>0)
                                            <span class="hot">{{$v_product->discount_price}} .00 Tk Off</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        
                                        <h2 class="text-center">{{$v_product->product_name}}</h2>

                                        <div class="product-category text-center">
                                            {{$v_product->weight}} 
                                            @if($v_product->weight>=1)
                                            .00 kg
                                            @else
                                            Gm
                                            @endif
                                        </div>
                                       
                                        <div class="product-price text-center">
                                            
                                            <span>{{$v_product->selling_price-$v_product->discount_price}} Tk</span>
                                           
                                             @if($v_product->discount_price>0)
                                            <span class="old-price">{{$v_product->selling_price}} Tk</span>
                                             @endif
                                        </div>

                                       
                                         <button type="submit"  class="btn btn-sm addToCart"  
                                         data-id="{{$v_product->id}}"
                                          @if($v_product->discount_price==Null)
                                          data-price="{{$v_product->selling_price}}"
                                          @else
                                          data-price="{{$v_product->selling_price-$v_product->discount_price}}"
                                        @endif
                                            ><i class="fi-rs-shopping-bag-add ">
                                            <span class="loading d-none">...</span>Add To Cart </i></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </form>
                    </div>
                </div>


            </div>
        </section>
   
    
      
        
       
        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span> Our </span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    @foreach ($brand as $v_brand )
                    <div class="brand-logo">
                            <img src="{{asset($v_brand->logo)}}" height="100px" alt="">
                        </div>
                        
                    @endforeach

                        
                        
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Toster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  $(document).on('click','.addToCart',function(e){
            e.preventDefault();

               let id=$(this).data('id');
               let price=$(this).data('price');

              $.ajax({

                url:"{{route('addToCart')}}",
                method:"post",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id,
                    price:price,
                
                },

                success:function(response){
        $('#addToCartForm')[0].reset();

        $('.loading').addClass('d-none');

        
          cart();

//add toster message
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
  title: 'Product Added success'
});
     //end toster


    }


  });

                });

</script>



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