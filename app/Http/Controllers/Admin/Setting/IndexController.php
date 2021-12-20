<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;

class IndexController extends Controller
{
    public function index()
    {
        $sets = Setting::orderby('id', 'DESC')->get();
        return view('setting.index',compact('sets'));
    }
    public function create()
    {
        
        return view('setting.create');

    }
    public function store(Request $request)
    {
        $set = new Setting;
        $set->name = $request->name;
        $set->value = $request->value;

        $set->save();

        return redirect()->route('settings.index');

    }
    public function edit( $id)
    {
        $set = Setting::find($id);
        return view('setting.edit', compact('set'));
    }
    public function update(Request $request, $id)
    {
        $set = Setting::find($id);
        $set->value = $request->value;
        $set->save();
        return redirect()->route('settings.index');

    }
    
    public function destroy($id)
    {
        $set=Setting::find($id)->delete();
        return redirect()->route('settings.index');
    }
}
