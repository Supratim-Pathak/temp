<?php

namespace App\Http\Controllers\Users\Forms;

use App\Http\Controllers\Controller;
use App\Models\requisition_details;
use Illuminate\Http\Request;

class RfqFormController extends Controller
{
    public function RfqForm()
    {
        return view('appPages.users.rfqForms');
    }
    
    public function RfqFormAction(Request $request)
    {

        DD($request->all());
        // $request->validate([
        //     'req_id'=>'required',
        //     'req_type'=>'required',
        //     'req_date'=>'required',
        //     'req_no'=>'required',
        //     'req_title'=>'required',
        //     'req_subject'=>'required',
        //     'req_desc'=>'required',
        //     'req_for'=>'required',
        //     'sol_type'=>'required',
        //     'initiated_by'=>'required',
        //     'requesting_department'=>'required',
        //     'project_for'=>'required',
        // ]);

        $reqdata = new requisition_details;
        ''=> $reqdata->requisition_id,
        ''=> $reqdata->type,
        ''=> $reqdata->requisition_no,
    }

}
