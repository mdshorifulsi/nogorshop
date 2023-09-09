<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use File;
class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::latest()->get();
        return view('admin.brand.index', compact('brand'));

    }
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:200',

            ],
            [
                'brand_name.required' => 'The Brand name is required.',
                'brand_name.unique' => 'This Brand is already exists.',

            ],
        );

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $directory='images/Brand_images/';
            $file->move($directory,$name);
            $url=$directory.$name;
            $brand->logo =$url;
        }

        $brand->save();
        return redirect()->route('brand.index')
            ->with('message', 'Brand added success');

    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $brand->logo = $request->file('logo')->move("images/Brand_images", $name);
        }

        $brand->save();
        return redirect()->route('brand.index')
            ->with('message', 'Brand updated success');


    }

    public function destroy($id)
    {
        
        $brand = Brand::find($id);
        if (File::exists($brand->logo)) {
            File::delete($brand->logo);
        }
        $brand->delete();
        return redirect()->route('brand.index');

    }
    public function inactive($id)
    {
        Brand::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);


    }

    public function active($id)
    {
        Brand::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }


}