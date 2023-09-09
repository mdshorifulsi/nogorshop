@extends('admin_layouts')
@section('admin_content')
@section('title','Edit product')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit product
                    
                </div>
                <br>
                <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}" type="text" placeholder="Product Name" />
                                <label for="inputFirstName">Product Name</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="brand_id">
                                <option> >> Select Brand Name...</option>
                                @foreach($brand as $row)
                                <option value="{{$row->id}}" 
                                    <?php
                                    if($row->id==$product->brand_id)
                                        echo "selected"
                                    ?>
                                    >{{$row->brand_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                     
                        
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="category_id">
                                <option> >> Select Category Name...</option>
                                @foreach($category as $row)
                                <option value="{{$row->id}}"
                                <?php
                                    if($row->id==$product->category_id)
                                        echo "selected"
                                ?>
                                    >
                                    {{$row->cat_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-control" name="subcategory_id" id="subcategory_id">
                                    <option selected="" disabled="" id="">Subcategorychoose</option> 
                                    @foreach($subcategory as $row)
                                    <option value="{{$row->id}}"
                                    <?php
                                        if($row->id==$product->subcategory_id)
                                            echo "selected"
                                    ?>
                                    >
                                    {{$row->subcat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="stock_quantity" name="stock_quantity" value="{{$product->stock_quantity}}" type="text" placeholder="stock quantity" />
                                <label for="inputFirstName">stock quantity</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="purchase_price" name="purchase_price" value="{{$product->purchase_price}}" type="text" placeholder="purchase price" />
                                <label for="inputFirstName">purchase price</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="selling_price" name="selling_price" value="{{$product->selling_price}}" type="text" placeholder="selling_price" />
                                <label for="inputFirstName">selling price</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="discount_price" name="discount_price"  value="{{$product->discount_price}}" type="text" placeholder="discount price" />
                                <label for="inputFirstName">Discount price</label>
                            </div>
                        </div>
                       
                        
                    </div>


                    <div class="row mb-3">
                        
                            <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="weight" name="weight" value="{{$product->weight}}" type="text" placeholder="weight" />
                                <label for="inputFirstName">weight</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-floating mb-3 mb-md-0">

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="offers" value="1"
                                        <?php if($product->offers==1)
                                            echo "checked"?>
                                        > offers(yes/no)
                                    </label>
                                </div>
                            </div>
                        </div>

                            
                               
                            <div class="col-md-5">
                            <div class="form-floating mb-3 mb-md-0">
                               
                                <div class="form-group col-lg-4">
                                    <label>Image</label>
                                    <input type="file" name="product_image">   
                            </div>
                             <img src="{{URL::to($product->product_image)}}"style="width: 200px;height: 150px;">
                                    <input type="hidden" name="old_image" value="{{$product->image}}">
                            </div>
                        </div>




                            </div>
                     

                        
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Product Description"  rows="3">{{$product->description}}
                                </textarea>
    
                                <label for="inputFirstName">Product Description</label>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

  $(document).ready(function(){


    $('select[name="category_id"]').on('change',function(){
        var category_id=$(this).val();

        if(category_id){
            $.ajax({
                url:"{{url('/admin/get/subcategory')}}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    // console.log(data);
                    $("#subcategory_id").empty();
                    $.each(data,function(key,value){
                        $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcat_name+ ' </option>');
                    })
                },

            });

            }else{
             alert('danger');  
            }
        
    });

  });
   

</script>

@endsection