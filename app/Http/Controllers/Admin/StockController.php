<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use Session;

class StockController extends Controller
{
    public function index()
    {

        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $product = Product::latest()->get();
        return view('admin.stock.index', compact('category', 'subcategory', 'brand', 'product'));
    }

    public function edit($id)
    {

        $stock = Product::find($id);
        return view('admin.stock.edit', compact('stock'));

    }
    public function update(Request $request, $id)
    {

        $data = array();
        $data['stock_quantity'] = $request->stock_quantity;
        DB::table('products')->where('id', $id)->update($data);
        return redirect()->route('stock.index')
            ->with('message', 'Product Quantity updated success');
        ;

    }
}