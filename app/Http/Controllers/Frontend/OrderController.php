<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cart;
use DB;
use Auth;
class OrderController extends Controller
{
    public function order_place(Request $request){

            $order=array();
            $order['customer_id']=Auth::id();
            $order['customer_ip']=request()->ip();
            $order['payment_id']=$request->payment_id;
            $order['customer_name']=$request->customer_name;
            $order['phone_number']=$request->phone_number;
            $order['address']=$request->address;
            $order['invoice_no']=mt_rand(10000000,999999999);
            

        if(Session::has('coupon')){
            $order['subtotal']=Cart::subtotal();
            $order['total']=Cart::total();
            $order['coupon_code']=Session::get('coupon')['name'];
            $order['discount_amount']=Session::get('coupon')['discount_amount'];
            $order['after_discount']=Session::get('coupon')['after_discount'];
        }else{
            $order['subtotal']=Cart::subtotal();
            $order['total']=Cart::total();

        }
        $order['date']=date('d-m-Y');
        $order['month']=date('d-m-Y');
        $order['year']=date('d-m-Y');

        // dd($order);

        $order_id=DB::table('orders')->insertGetId($order);


        //order Details

        $content=Cart::content();

        $orderdetails=array();

        foreach($content as $row){
            $orderdetails['order_id']=$order_id;
            $orderdetails['product_id']=$row->id;
            $orderdetails['product_name']=$row->name;
            $orderdetails['product_quantity']=$row->qty;
            $orderdetails['single_price']=$row->price;
            $orderdetails['subtotal_price']=$row->price*$row->qty;
            DB::table('orderdetails')->insert($orderdetails);
           

        }

        Cart::destroy();

        if(Session::has('coupon')){
            Session::forget('coupon');
        }


        return view('frontend.checkout.order_done');
        // return redirect()->route('home')->with('message','order confirm success');

        
    }
}
