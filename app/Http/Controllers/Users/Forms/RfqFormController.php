<?php

namespace App\Http\Controllers\Users\Forms;

use App\Http\Controllers\Controller;
use App\Models\requisition_details;
use App\Models\requisition_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RfqFormController extends Controller
{
    public function RfqForm()
    {
        $reqId = strtotime(date('Y-m-d H:i:s')) . rand(100, 999);
        return view('appPages.users.rfqForms' ,compact('reqId'));
    }
    
    public function Rfqlist()
    {
        return view('appPages.users.reqList');
    }
    
    public function RfqFormAction(Request $request)
    {
    
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
        //     'bid_type'=>'required',
        //     'attachment.*'=>'nullable|mimes:pdf',
        // ]);
        
        // ========================FILE UPLOAD ================
        $file_name = '';
        if($request->hasfile('attachment'))
        {
            
            foreach($request->file('attachment') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);

                $file_name = $file_name . $name . ',';
            }
        }
        
        // ========================FILE UPLOAD ================


        $reqdata = new requisition_details();

        $reqdata->requisition_id = $request->req_id;
        $reqdata->type = $request->req_type;
        $reqdata->requisition_no = $request->req_no;
        $reqdata->date = $request->req_date;
        $reqdata->title = $request->req_title;
        $reqdata->subject = $request->req_subject;
        $reqdata->description = $request->req_desc;
        $reqdata->requisition_for = $request->req_for;
        $reqdata->solicitation_type = $request->sol_type;
        $reqdata->initiated_by = $request->initiated_by;
        $reqdata->requesting_department = $request->requesting_department;
        $reqdata->requester = Auth::user()->name;
        $reqdata->project_for = $request->project_for;
        $reqdata->bid_type = $request->bid_type;
        $reqdata->suporting_document = $file_name;

        $reqdata->save();
        

        for ($i=0; $i < count($request->data)  ; $i++) { 
           

            $reqitem =  new requisition_item();

            $reqitem->req_id =  $reqdata->id;
            $reqitem->item = $request->data[$i]['item'];
            $reqitem->specification  = $request->data[$i]['spec'];
            $reqitem->qty  = $request->data[$i]['oty'];
            $reqitem->uom  = $request->data[$i]['umo'];
            $reqitem->delivered_within = $request->data[$i]['delivered_within'];
            $reqitem->remarks = $request->data[$i]['remark'];

            $reqitem->save();
        
        }
            return redirect()->back()->with('success', "Data Saved Sucessfully");
        

    }

}
