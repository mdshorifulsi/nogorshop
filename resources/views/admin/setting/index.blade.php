@extends('admin_layouts')
@section('admin_content')
@section('title','Setting')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Setting
                    
                </div>
                <br>
                <form action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" name="project_name" value="{{$setting->project_name}}" type="text"  />
                                <label for="inputFirstName">Project Name</label>
                        </div>
                        </div>
                       

                        <div class="col-md-6">
                            <img src="{{URL::to($setting->logo)}}"style="width: 200px;height: 150px;">
                                    <input type="hidden" name="old_image" value="{{$setting->logo}}">
                                    <input type="file" name="logo">   
                         
                             
                            </div>



                                         
                    </div>

                 <div class="row mb-3">
                               
                           <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="notice_one" value="{{$setting->notice_one}}" type="text"  />
                                <label for="inputFirstName">notice one</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="notice_two" value="{{$setting->notice_two}}" type="text"  />
                                <label for="inputFirstName">notice Two </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="address" value="{{$setting->address}}" type="text"  />
                                <label for="inputFirstName">address</label>
                            </div>
                        </div>
                               
                           <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="phone_number" value="{{$setting->phone_number}}" type="number"  />
                                <label for="inputFirstName">phone number</label>
                            </div>
                        </div>

                        

                        <div class="col-md-4">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="email" value="{{$setting->email}}" type="email"  />
                                <label for="inputFirstName">E-mail</label>
                            </div>
                        </div>
                    </div>
                     

                        
                    
                   
                    
                    <div class="card-footer">
                        
                        <button type="submit" class="btn btn-primary">Update</button>
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