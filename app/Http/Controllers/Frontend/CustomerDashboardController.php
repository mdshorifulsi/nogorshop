<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
class CustomerDashboardController extends Controller
{
     public function myaccount(){

     $myorder=Order::where('customer_id',Auth::id())->orderBy('id','DESC')->get();
      return view('frontend.customer.myaccount',compact('myorder'));
    }
}
