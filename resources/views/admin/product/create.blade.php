@extends('admin_layouts')
@section('admin_content')
@section('title','All product')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Add product
                    
                   
                </div>
                <br>
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
                	@csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="product_name" name="product_name" type="text"  placeholder="Product Name" required />
                                <label for="inputFirstName">Product Name</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                            <select class="form-control" name="brand_id">
                                <option> >> Select Brand Name...</option>
                                @foreach($brand as $row)
                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
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
                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                        	<div class="form-floating mb-3 mb-md-0">
                        		<select class="form-control" name="subcategory_id" id="subcategory_id">
                        			<option selected="" disabled="" id="">
                        			Subcategorychoose</option>    
                        		</select>
                        	</div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="stock_quantity" name="stock_quantity" type="text"  placeholder="stock quantity" required/>
                                <label for="inputFirstName">stock quantity</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mb-3">
                    	<div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="purchase_price" name="purchase_price" type="text" placeholder="purchase price" required />
                                <label for="inputFirstName">purchase price</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="selling_price" name="selling_price" type="text" placeholder="selling_price" required/>
                                <label for="inputFirstName">selling price</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="discount_price" name="discount_price" type="text" placeholder="discount price" />
                                <label for="inputFirstName">Discount price</label>
                            </div>
                        </div>
                     
                        
                    </div>


                    <div class="row mb-3">

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="weight" name="weight" type="text" placeholder="weight" required/>
                                <label for="inputFirstName">weight</label>
                            </div>
                        </div>


                         <div class="col-md-3">
                            <div class="form-floating mb-3 mb-md-0">

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="offers" value="1"> offers(yes/no)
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
                            </div>
                        </div>

                       
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Product Description"  rows="3"></textarea>
    
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