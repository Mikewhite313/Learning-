<?php

namespace App\Http\Controllers\admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $datas = Category::orderby('id', 'DESC')->get();
        return view('categories.index',compact('datas'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $data = new Category;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);

        $data->save();

        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return view('categories.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $data=Category::find($id);
        $data->title = $request->title;
        $data->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $data=Category::find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function status_update($id)
    {
        $prod = DB::table('categories')
                ->select('status')
                ->where('id','=',$id)
                ->first();
        if($prod->status == '1'){
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('categories')->where('id',$id)->update($values);
        return redirect()->route('categories.index');
    }
    public function show($id)
    {
        $data = Category::find($id);
        return view('categories.show',compact('data'));
    }
}
