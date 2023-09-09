@extends('layouts')
@section('content')
@section('title','checkout')
<main class="main">
    <section class="mt-25 mb-25">
        <div class="container">
            <div class="row">

                 {{-- billing start --}}
                <div class="col-lg-6 mb-sm-15">
                    <div class="toggle_info">
                        <form action="{{route('order.place')}}" method="post">
                           @csrf
                        <div class="mb-25">
                            <h4>Billing Address</h4>
                        </div>
                        {{-- form --}}
                        
                            @if(Auth::user())
                            <label>Customer Name<span class="text-danger"> *</span>
                            </label>
                            <div class="form-group ">
                                <input type="text" class="text-danger" required="" value="{{Auth::user()->name}}" name="customer_name" placeholder="customer name *">
                            </div>
                            @else
                            <label>Customer Name<span class="text-danger"> *</span></label>
                            <div class="form-group ">
                                <input type="text" class="text-danger" required=""name="customer_name" placeholder="customer name *">
                            </div>
                            @endif
                            @if(Auth::user())
                            <label>phone number<span class="text-danger"> *</span>
                            </label>
                            <div class="form-group">
                                <input required="" class="text-danger" type="text" value="{{Auth::user()->phone_number}}" name="phone_number" placeholder="phone number *">
                            </div>
                            @else
                            <label>phone number<span class="text-danger"> *</span></label>
                            <div class="form-group">
                                <input required="" class="text-danger" type="text" name="phone_number" placeholder="phone number *">
                            </div>
                            @endif
                            <label>Address<span class="text-danger"> *</span></label>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="Address *">
                            </div>
                            
                        </div>
                </div>



                {{-- billing end --}}
                

                {{-- cart total --}}
                <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal
                                            </td>
                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{Cart::subtotal()}} Tk</span>
                                            </td>
                                        </tr>
                                        @if(Session::has('coupon'))
                                        <tr>
                                            <td class="cart_total_label">coupon Name</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> {{Session::get('coupon')['name']}}<a href="{{route('coupon_remove')}}" id="couponremove"><i class="fi-rs-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Discount</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> {{Session::get('coupon')['discount_amount']}} % Tk
                                            </td>
                                        </tr>
                                        @else
                                        @endif
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                        </tr>
                                        @if(Session::has('coupon'))
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount">
                                                <i class="ti-gift mr-5"></i>{{ number_format(Session::get('coupon')['after_discount'], 2) }}Tk
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> {{Cart::total()}} Tk</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                             
                        </div>
                </div>
                {{-- cart total end --}}
            </div>


<div class="row">
               

                {{-- payment start --}}
                <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <div class="mb-25">
                            <h4>Payment</h4>
                        </div>
                            <div>
                                @php
                                $payment=App\Models\Payment::get();
                                @endphp
                                @foreach($payment as $v_payment)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_id" id="flexRadioDefault1" value="{{$v_payment->id}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$v_payment->payment_name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                             
                        </div>
                        <button type="submit" class="btn btn-primary">Place Order</button>

                       
                    </div>
                    </form>
                    {{-- payment end --}}

                    {{-- coupon start --}}
                <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                             <div class="mb-25 mt-25">
                                <div class="heading_s1 mb-3">
                                    @if(Session::has('coupon'))
                                    @else
                                    <h4>Apply Coupon</h4>
                                    @endif
                                </div>
                            <div class="total-amount">
                                <div class="left">
                                    <div class="coupon">
                                        @if(Session::has('coupon'))
                                        @else
                                        <form action="{{route('couponApply')}}" method="post">
                                            @csrf
                                            <div class="form-row row justify-content-center">
                                                <div class="form-group col-lg-6">
                                                    <input class="font-medium" name="coupon_code" placeholder="Enter Your Coupon">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <button class="btn  btn-sm">Apply Coupon </button>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>

                {{-- coupon end --}}
                </div>
            </div>
        </section>
    </main>


    {{-- Toster --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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