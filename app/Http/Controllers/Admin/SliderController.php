<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'slider_title' => 'required|unique:sliders|max:200',

            ],
            [
                'slider_title.required' => 'The slider name is required.',
                'slider_title.unique' => 'This slider is already exists.',

            ],
        );
        $slider = new Slider;
        $slider->slider_title = $request->slider_title;
        $slider->slider_subtitle = $request->slider_subtitle;
        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $slider->slider_image = $request->file('slider_image')->move("images/slider_image", $name);
        }
        $slider->save();
        return redirect()->route('slider.index')
            ->with('message', 'Slider added success');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->slider_title = $request->slider_title;
        $slider->slider_subtitle = $request->slider_subtitle;
        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $slider->slider_image = $request->file('slider_image')->move("images/slider_image", $name);
        }
        $slider->save();
        return redirect()->route('slider.index')
            ->with('message', 'Slider updated success');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (File::exists($slider->slider_image)) {
            File::delete($slider->slider_image);
        }
        $slider->delete();

        return redirect()->route('slider.index');

    }

    public function inactive($id)
    {
        Slider::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function active($id)
    {
        Slider::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }
}