<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupon'));

    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'coupon_code' => 'required|unique:coupons|max:200',

            ],
            [
                'coupon_code.required' => 'The coupon name is required.',
                'coupon_code.unique' => 'This coupon is already exists.',

            ],
        );

        $coupon = new Coupon;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount = $request->discount;
        $coupon->valid_date = $request->valid_date;
        $coupon->save();

        return redirect()->route('coupon.index')
            ->with('message', 'Coupon added success');



    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupon'));

    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->coupon_code = $request->coupon_code;
        $coupon->discount = $request->discount;
        $coupon->valid_date = $request->valid_date;

        $coupon->save();
        return redirect()->route('coupon.index')
            ->with('message', 'Coupon updated success');

    }


    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if (!is_null($coupon)) {
            $coupon->delete();
        }
        return redirect()->route('coupon.index');

    }


    public function inactive($id)
    {
        Coupon::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function active($id)
    {
        Coupon::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}