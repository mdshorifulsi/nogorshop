<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use DB;

class OrderController extends Controller
{
    public function index()
    {

        $order = DB::table('orders')
            ->join('payments', 'orders.payment_id', 'payments.id')
            ->select('payments.payment_name', 'orders.*')
            ->get();

        // $order=Order::latest()->get();
        return view('admin.order.index', compact('order'));
    }

    public function Pending($id)
    {

        Order::where('id', $id)
            ->update(['is_completed' => 0]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function order_done($id)
    {
        Order::where('id', $id)
            ->update(['is_completed' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }


    public function order_details($id)
    {

        $order = DB::table('orders')->where('id', $id)->first();
        $order_details = DB::table('orderdetails')->where('order_id', $id)->get();
        return view('admin.order.order_details', compact('order', 'order_details'));

    }
}