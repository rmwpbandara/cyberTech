<?php
/**
 * Created by PhpStorm.
 * User: rmwpb
 * Date: 3/9/2019
 * Time: 1:49 PM
 */

namespace Modules\Admin\Http\Controllers;


use App\BatchName;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CRUDController
{

    public function bulk()
    {
        $emails = DB::table('emails')->where('user_id', '=', Auth::id())->get();
        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();


        return view('admin::crud.bulk_emails_upload')->with(['emails' => $emails, 'batch_names' => $batch_names]);

    }

    public function single()
    {
        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();

        return view('admin::crud.single_email_upload')->with(['batch_names' => $batch_names]);
    }


    public function add_batch_name()
    {

        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();
        return view('admin::crud.add_batch_name')->with('batch_names', $batch_names);
    }


    public function uploadExcel(Request $request)
    {

        $request->validate([
            'import_file' => 'required'
        ]);

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        $user_id = Auth::id();

        if ($data->count()) {

            foreach ($data as $key => $value) {
                $arr[] = ['name' => $value->name, 'contact_number' => $value->contact_number, 'network_id' => $value->network_id, 'email' => $value->email, 'batch_id' => $request->batch_id, 'user_id' => $user_id];
            }

            if (!empty($arr)) {
                Email::insert($arr);
            }
        }
        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();
        $emails = DB::table('emails')->where('user_id', '=', Auth::id())->get();


        return back()->with(['success' => 'Insert Record successfully.', 'batch_names' => $batch_names, 'emails' => $emails]);

    }

    public function singleUpload(Request $request)
    {

        $arr[] = ['name' => $request->name, 'contact_number' => $request->contact_number, 'network_id' => $request->network_id, 'email' => $request->email, 'batch_id' => $request->batch_id, 'user_id' => Auth::id()];

        Email::insert($arr);
        return back()->with('success', 'Insert Record successfully.');

    }

    public function add_batches(Request $request)
    {

        $arr[] = ['name' => $request->batch_name, 'user_id' => Auth::id()];

        BatchName::insert($arr);
        return back()->with('success', 'Insert Record successfully.');

    }


    public function get_update_email(Request $request)
    {

        $update_email = Email::find($request->id);
        $batch_names = DB::table('batch_names')->where('user_id', '=', Auth::id())->get();

        return view('admin::crud.update_email')->with(['update_email' => $update_email, 'batch_names' => $batch_names]);

    }

    public function update_email(Request $request)
    {

//        dd($request->all());

        $field = Email::find($request->id);
        $field->name = $request->name;
        $field->contact_number = $request->contact_number;
        $field->network_id = $request->network_id;
        $field->email = $request->email;
        $field->batch_id = $request->batch_id;
        $field->user_id = Auth::id();
        $field->save();

        return redirect()->route('bulk_email')->with(['success' => 'Update Record successfully.']);
    }

    public function delete_email(Request $request)
    {

        $flight = Email::find($request->id);
        $flight->delete();
        return back()->with('success', 'Deleted Record successfully.');

    }
}
