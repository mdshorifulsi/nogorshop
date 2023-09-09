@extends('layouts')
@section('content')
@section('title','my Account')
 <main class="main">
  
        <section class="pt-15 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link text-center" id="orders-tab" data-bs-toggle="tab"  role="tab" aria-controls="orders" aria-selected="false"><h4> Welcome to ....<i class="fi-rs-user mr-10"></i> <strong style="color:#11F39A;"> {{Auth::user()->name}}</h4></strong></a>
                                           
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>My Orders</a>
                                        </li>
                                       
                                        
                                       
                                        <li class="nav-item">
                                            <a class="dropdown-item " href="{{ route('logout') }}"onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>
                                                 <strong>{{ __('Sign Out ') }}</strong>
                                                 </a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>



                                          
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                   
                                            <div class="card-header">
                                                Dashboard
                                            </div>
                                            <hr>
                                      
                                 <div class="row">
                                     <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                               <h6 class="card-title">Total Order</h6>
                                               <h6 class="cart-product-sub-total test-muted text-center">15</h6>
                                              
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                               <h6 class="card-title">Complate order</h6>
                                               <h6 class="cart-product-sub-total test-muted text-center">15</h6>
                                              
                                            </div>
                                          
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                               <h6 class="card-title">Pending Order</h6>
                                               <h6 class="cart-product-sub-total test-muted text-center">15</h6>
                                              
                                            </div>
                                          
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                               <h6 class="card-title">Cancel Order</h6>
                                               <h6 class="cart-product-sub-total test-muted text-center">15</h6>
                                              
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice.no</th>
                                                                <th>Date</th>
                                                                <th>payment type</th>
                                                                <th>Total</th>
                                                                <th>Satus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($myorder as $row)
                                                            <tr>
                                                                <td>{{$row->invoice_no}}</td>

                                                                <td>{{$row->date}}</td>
                                                               <td>{{$row->payment->payment_name}}</td>

                                                                @if($row->after_discount)
                                                                <td>{{$row->after_discount}} Tk</td>
                                                                @else
                                                                <td>{{$row->total}} Tk</td>
                                                             @endif
                                                             
                                                                <td>
                                    @if($row->is_completed==1)
                                    <span class="badge text-bg-success" >Order Done</span>
                                    @else
                                    <span class="badge text-bg-danger">Pending</span>
                                    @endif
                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                          
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection