<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $product = Product::latest()->get();

        return view('admin.product.index', compact('category', 'subcategory', 'brand', 'product'));
    }

    public function create()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.product.create', compact('category', 'subcategory', 'brand'));
    }

    public function getsubcat($category_id)
    {
        // return $category_id;
        $subcategory = SubCategory::where('category_id', $category_id)->get();
        return response()->json($subcategory);

    }


    public function store(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->offers = $request->offers;
        $product->admin_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->product_image = $request->file('product_image')->move("images/product_image", $name);
        }

        $product->save();
        return redirect()->route('product.index')
            ->with('message', 'Product added success');

    }


    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::get();
        $subcategory = SubCategory::get();
        $brand = Brand::get();

        return view('admin.product.edit', compact('product', 'category', 'subcategory', 'brand'));

    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->description = $request->description;
        $product->weight = $request->weight;
        $product->offers = $request->offers;
        $product->admin_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->product_image = $request->file('product_image')->move("images/product_image", $name);
        }

        $product->save();
        return redirect()->route('product.index')
            ->with('message', 'Product updated success');


    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (File::exists($product->product_image)) {
            File::delete($product->product_image);
        }
        $product->delete();
        return redirect()->route('product.index');
    }


    public function inactive($id)
    {
        Product::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {
        Product::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }



}