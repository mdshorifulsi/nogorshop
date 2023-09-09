@extends('admin_layouts')
@section('admin_content')
@section('title','All Order')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    ALL Order
                </div>
                <div class="card-body">
                    <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>name</th>
                                <th>phone</th>  
                                <th>Address</th>  
                                <th>Payment</th>
                                {{-- <th>subtotal </th> --}}
                                <th>total</th>
                                
                                 <th>With discount</th>
                                 <th>date</th>
                                 <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key=>$row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->customer_name}}</td>
                                <td>{{$row->phone_number}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->payment_name}}</td>
                                <td>{{$row->total}}</td>
                                @if($row->after_discount)
                                <td>{{$row->after_discount}}</td>
                                @else
                                <td>{{$row->total}}</td>
                                @endif
                                <td>{{$row->date}}</td>
                                <td>
                                    @if($row->is_completed==1)
                                    <span class="badge text-bg-success" >Order Done</span>
                                    @else
                                    <span class="badge text-bg-danger">Pending</span>
                                    @endif
                                </td>
                                   <td>
                                    @if($row->is_completed==1)
                                    <a href="" class="btn btn-sm btn-danger Pending" data-id="{{$row->id}}"><i class="bi bi-hand-thumbs-up"></i></a>
                                    @else
                                    <a href="" class="btn btn-sm btn-success order_done" data-id="{{$row->id}}"><i class="bi bi-hand-thumbs-down"></i></a>
                                    @endif
                                    
                                    <a href="{{route('Order.details',$row->id)}}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></i></a>         
                                    
                                    
                                </td>
                             
                               
                                
                              
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

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