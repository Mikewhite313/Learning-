<?php

namespace App\Http\Controllers\Admin\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Logs;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use DB;

class IndexController extends Controller
{
    public function logs()
    {
        $activities = Logs::with('user')->orderby('id', 'DESC')->paginate(10);
        // return $activities = DB::table('activity_log')->orderby('id', 'DESC')->get();
        return view('general.logs',compact('activities'));
    }
    public function content()
    {
        return view('general.content');
    }
    public function setting()
    {
        return view('general.setting');
    }
    public function search(Request $request)
    {
        $to = date('Y-m-d 00:00:00',strtotime($request->to));
        $from = date('Y-m-d 23:59:59',strtotime($request->from));

        $activities = DB::table('activity_log')->whereBetween('created_at', [$to, $from])->get();
        // dd($activities);
        return view('general.search',compact('activities'));
    }
}
