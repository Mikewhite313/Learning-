<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Organization;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $datas = Category::orderby('id', 'DESC')->get();
        $data = User::orderby('id', 'DESC')->get();
        $datas = Organization::orderby('id', 'DESC')->get();
        return view('organizations.index',compact('datas','data'));
    }
    public function create()
    {
        $datas = Category::get();
        $data = User::get();
        return view('organizations.create',compact('datas','data'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = new Organization;
        $data->name = $request->name;
        $data->user_id = $request->user_id;
        $data->category_id = $request->category_id;
        $data->amount = $request->amount;
        $data->expiry_date = $request->expiry_date;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;
        $data->description = $request->description;
        if($request->hasFile('image')){
            $file = $request->file('image');
             $fileName = rand().'.'. $file->getClientOriginalExtension();
             $file->move(public_path('uploads/images'), $fileName);
            
             $data->image = $fileName;}

             $data->save();
             

                return redirect()->route('organizations.index');

    }
    public function status_update1($id)
    {
        $data = DB::table('organizations')
                ->select('status')
                ->where('id','=',$id)
                ->first();
        if($data->status == '1'){
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('organizations')->where('id',$id)->update($values);
        return redirect()->route('organizations.index');
    }
}
