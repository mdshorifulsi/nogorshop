<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Feature;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use File;
use DB;


class HomeController extends Controller
{

    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->get();
        $feature = Feature::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();
        $category = Category::with('sub_categoies')->where('status', '1')->get();
        $subcategory = SubCategory::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->where('status', '1')->take(16)->get();
        return view('frontend.homepage', compact('slider', 'feature', 'brand', 'category', 'subcategory','product'));
    }



public function product_by_category($id){

    
    $product_by_category=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('sub_categories','products.subcategory_id','=','sub_categories.id')
            ->select('products.*','categories.cat_name','sub_categories.subcat_name')

            ->where('sub_categories.id',$id)
            ->get();

        return view('frontend.product.show_category',compact('product_by_category'));




}



public function search(Request $request){



    if($request->search){

        $searchProduct=DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->join('sub_categories','products.subcategory_id','=','sub_categories.id')
            ->select('products.*','categories.cat_name','sub_categories.subcat_name')

            ->where('product_name','LIKE','%'.$request->search.'%')->latest()->get();
        return view('frontend.product.search',compact('searchProduct'));
    }else{

            return back() ->with('message','This product not found');
    }


}



}