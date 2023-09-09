<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Str;
use File;

class FeatureController extends Controller
{
    public function index()
    {
        $feature = Feature::latest()->get();
        return view('admin.feature.index', compact('feature'));
    }
    public function create()
    {
        return view('admin.feature.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'feature_name' => 'required|unique:features|max:200',

            ],
            [
                'feature_name.required' => 'The feature name is required.',
                'feature_name.unique' => 'This feature is already exists.',

            ],
        );

        $feature = new Feature;
        $feature->feature_name = $request->feature_name;
        $feature->feature_slug = Str::slug($request->feature_name);

        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $feature->feature_image = $request->file('feature_image')->move("images/feature_images", $name);
        }
        $feature->save();
        return redirect()->route('feature.index')
            ->with('message', 'feature added success');





    }


    public function edit($id)
    {
        $feature = Feature::find($id);
        return view('admin.feature.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $feature = Feature::find($id);
        $feature->feature_name = $request->feature_name;
        $feature->feature_slug = Str::slug($request->feature_name);
        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $feature->feature_image = $request->file('feature_image')->move("images/feature_images", $name);
        }
        $feature->save();
        return redirect()->route('feature.index')
            ->with('message', 'feature updated success');

    }

    public function destroy($id)
    {
        $feature = Feature::find($id);
        if (File::exists($feature->feature_image)) {
            File::delete($feature->feature_image);
        }

        $feature->delete();
        return redirect()->route('feature.index');
    }
    public function inactive($id)
    {
        Feature::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function active($id)
    {
        Feature::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }



}