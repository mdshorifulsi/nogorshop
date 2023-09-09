<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Cart;
use Session;
use DB;

class CartController extends Controller
{
     public function addcart(Request $request){

    

        $product=Product::where('id',$request->id)->first();

        // return $product;
    
        
        Cart::add([
            'id'=>$request->id,
            'name'=>$product->product_name,
            'qty'=>1,
            'price'=>$request->price,
            'weight'=>1,
            'options'=>['image'=>$product->product_image],


        ]);

       return response()->json([
            'status' => 'success',
        ]);

    }

    public function all_cart(){

        $data=array();
        $data['qty']=Cart::count();
        $data['total']=Cart::total();
        return response()->json($data);
    }


    public function cart(){

        $content=Cart::content();

        return view('frontend.cart.cart',compact('content'));
    }


    public function cartremoveproduct($rowId){

        Cart::remove($rowId);

        return response()->json('success');

    }

    public function cartUpdateqty($rowId,$qty){

        Cart::update($rowId,['qty'=>$qty]);
        return response()->json('success');

    }


    // coupon apply
     public function couponApply(Request $request) {
    $check = DB::table('coupons')->where('coupon_code', $request->coupon_code)->first();

    if ($check) {
        if (date('Y-m-d') <= date('Y-m-d', strtotime($check->valid_date))) {

            $discount = (float) $check->discount;

            if ($discount > 0) {
                $subtotal = 0;

                foreach (Cart::content() as $item) {
                    $subtotal += $item->subtotal;
                }

                $afterDiscount = $subtotal - ($subtotal * ($discount / 100));

                Session::put('coupon', [
                    'name' => $check->coupon_code,
                    'discount_amount' => $discount,
                    'after_discount' => $afterDiscount
                ]);

                return redirect()->back()->with('message','Coupon added success');
            } else {
                // Handle zero discount case
                return redirect()->back();
            }
        } else {
            // Handle invalid date
            return redirect()->back();
        }
    } else {
        // Handle invalid coupon code
        return redirect()->back();
    }
}


    public function coupon_remove(){
        Session::forget('coupon');
         return redirect()->back()->with('message','Coupon remove success');
    }

    

}

