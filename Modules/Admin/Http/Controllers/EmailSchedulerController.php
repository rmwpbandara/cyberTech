<?php
/**
 * Created by PhpStorm.
 * User: rmwpb
 * Date: 3/10/2019
 * Time: 1:32 PM
 */
namespace Modules\Admin\Http\Controllers;

use App\ScheduleEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailSchedulerController
{
    public function email_scheduler()
    {

        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();
        return view('admin::email_scheduler.email_scheduler')->with(['batch_names'=>$batch_names]);
    }

    public function schedule_email_save(Request $request){

        $arr[] = ['batch_id' => $request->batch_id,
            'subject' => $request->email_subject,
            'body_type' => $request->email_body_type,
            'body' => $request->email_body,
            'date' => $request->email_date];

        ScheduleEmail::insert($arr);
        return back()->with('success', 'Insert Record successfully.');

    }
}
