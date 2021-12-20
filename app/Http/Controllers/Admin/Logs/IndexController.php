<?php

namespace App\Http\Controllers\Admin\Logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function logs(){
        $activities = DB::table('activity_log')->with('users')->orderBy('id','DESC')->get();
      return view('general.logs',compact('activities'));
    // DB::getSchemaBuilder()->getColumnListing($activity_log,$id);
    // return redirect()->route('logs');
    }
}
