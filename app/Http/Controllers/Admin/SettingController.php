<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use DB;

class SettingController extends Controller
{
    public function index()
    {

        $setting = DB::table('settings')->first();
        return view('admin.setting.index', compact('setting'));
    }
    public function update(Request $request, $id)
    {

        $setting = Setting::find($id);
        $setting->project_name = $request->project_name;
        $setting->logo_title = $request->logo_title;
        $setting->notice_one = $request->notice_one;
        $setting->notice_two = $request->notice_two;
        $setting->phone_number = $request->phone_number;
        $setting->address = $request->address;
        $setting->email = $request->email;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $setting->logo = $request->file('logo')->move("images/setting", $name);
        }

        $setting->save();
        return redirect()->route('setting.index');

    }
}