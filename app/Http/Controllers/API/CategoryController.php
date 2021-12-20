<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Category;
use Validator;
use Illuminate\Support\Str;
use DB;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends BaseController
{
    public function index()
    {
        $datas = Category::all();
        return $datas;
        return $this->sendResponse(CategoryResource::collection($datas), 'Category retrieved successfully.');
    }
    // public function create()
    // {
    //     return view('categories.create');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required'
        ]);
        $data = new Category;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);

        $data->save();

   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
       
        
   
        return $this->sendResponse(new CategoryResource($data), 'Category created successfully.');
    }
    
    // public function edit($id)
    // {
    //     $data = Category::find($id);
    //     return view('categories.edit', compact('data'));
    // }

    // public function update($id, Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required'
    //     ]);
    //     $data=Category::find($id);
    //     $data->title = $request->title;
    //     $data->save();
    //     return redirect()->route('categories.index');
    // }

    // public function destroy($id)
    // {
    //     $data=Category::find($id)->delete();
    //     return redirect()->route('categories.index');
    // }

    // public function status_update($id)
    // {
    //     $prod = DB::table('categories')
    //             ->select('status')
    //             ->where('id','=',$id)
    //             ->first();
    //     if($prod->status == '1'){
    //         $status = '0';
    //     }else{
    //         $status = '1';
    //     }

    //     $values = array('status' => $status);
    //     DB::table('categories')->where('id',$id)->update($values);
    //     return redirect()->route('categories.index');
    // }
    // public function show($id)
    // {
    //     $data = Category::find($id);
    //     return view('categories.show',compact('data'));
    // }
}
