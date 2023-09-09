<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use DB;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategory = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', 'categories.id')
            ->select('categories.cat_name', 'sub_categories.*')
            ->get();
        // $subcategory = SubCategory::with('category')->latest()->get();
        return view('admin.subcategory.index', compact('subcategory'));

    }

    public function create()
    {
        $category = Category::get();
        return view('admin.subcategory.create', compact('category'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                'subcat_name' => 'required|unique:sub_categories|max:200',

            ],
            [
                'subcat_name.required' => 'The coupon name is required.',
                'subcat_name.unique' => 'This coupon is already exists.',

            ],
        );

        $subcategory = new SubCategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->subcat_slug = Str::slug($request->subcat_name);




        $subcategory->save();
        return redirect()->route('subcategory.index')
            ->with('message', 'category added success');



    }

    public function edit($id)
    {
        $category = Category::get();
        $subcategory = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->subcat_slug = Str::slug($request->subcat_name);
        $subcategory->save();
        return redirect()->route('subcategory.index')
            ->with('message', 'category Update success');


    }

    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if (!is_null($subcategory)) {
            $subcategory->delete();
        }
        return redirect()->route('subcategory.index');

    }




}