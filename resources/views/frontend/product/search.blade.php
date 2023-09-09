@extends('layouts')
@section('content')
@section('title','search')

 <div class="row">
    

        
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
           
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Related product </button>
                        </li>
                       
                        
                    </ul>
                   
                </div>
                <!--End nav-tabs-->
                <form action="" id="addToCartForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">

                        

                        <div class="row product-grid-4">
                            @foreach($searchProduct as $v_search)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="product-details.html">
                                                <img class="default-img" src="{{asset($v_search->product_image)}}" height="150px" width="100px" alt="">
                                                
                                            </a>
                                        </div>              
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($v_search->discount_price>0)
                                            <span class="hot">{{$v_search->discount_price}} .00 Tk Off</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        
                                        <h2 class="text-center"><a href="product-details.html">{{$v_search->product_name}}</a></h2>
                                        <div class="product-category text-center">
                                            <a href="#">{{$v_search->weight}} kg</a>
                                        </div>
                                       
                                        <div class="product-price text-center">
                                            
                                            <span>{{$v_search->selling_price-$v_search->discount_price}} Tk</span>
                                           
                                             @if($v_search->discount_price>0)
                                            <span class="old-price">{{$v_search->selling_price}} Tk</span>
                                             @endif
                                        </div>

                                       
                                         <button type="submit"  class="btn btn-sm addToCart"  
                                         data-id="{{$v_search->id}}"
                                          @if($v_search->discount_price==Null)
                                          data-price="{{$v_search->selling_price}}"
                                          @else
                                          data-price="{{$v_search->selling_price-$v_search->discount_price}}"
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
     
      

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

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
    }


  });

                });

</script>

        @endsection