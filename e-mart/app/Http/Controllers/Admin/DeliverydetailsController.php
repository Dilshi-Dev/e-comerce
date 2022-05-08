<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deliverydetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class DeliverydetailsController extends Controller
{
    public function details(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search !=""){
            $deliverydetails=Deliverydetail::where('trackingno','LIKE',"%$search%")->get();
        }else{
            $deliverydetails=Deliverydetail::get();
        }
        $data=compact('deliverydetails','search');
        return view('admin.deliverydetails')->with($data);

    }


    public function store(Request $request)
    {
        $validatedata=$request->validate([
            'trackingno'=>'required',
            'orderplacement'=>'required',
            'vehicleno'=>'required',
            'deliverycharge'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'receiversnumber'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'

        ]);


        $delivery=new Deliverydetail;
        $delivery->trackingno=$request->input('trackingno');
        $delivery->orderplacement=$request->input('orderplacement');
        $delivery->vehicleno=$request->input('vehicleno');
        $delivery->deliverycharge=$request->input('deliverycharge');
        $delivery->receiversnumber=$request->input('receiversnumber');

        $delivery->save();
        Session::flash('message','Delivery Detail Created Successfully');
        Session::flash('class','success');

        return back();

    }


    public function edit($id){
        $deliverydetail=Deliverydetail::find($id);

        return view('admin.deliveryedit',compact('deliverydetail'));

    }

    public function update(Request $request){
        $delivery=Deliverydetail::find($request->id);
        
        $delivery->trackingno=$request->input('trackingno');
        $delivery->orderplacement=$request->input('orderplacement');
        $delivery->vehicleno=$request->input('vehicleno');
        $delivery->deliverycharge=$request->input('deliverycharge');
        $delivery->receiversnumber=$request->input('receiversnumber');

        $delivery->update();
        Session::flash('message','Delivery Detail Updated Successfully');
        Session::flash('class','success');

        return redirect('deliverymanager');

        

    }

    public function delete($id){
        $delivery=Deliverydetail::find($id);
        $delivery->delete();
        Session::flash('message','Delivery Detail Deleted Successfully');
        Session::flash('class','danger');

        return back();

    }

    public function exportCsv(Request $request)
{
   $fileName = 'delivery.csv';
   $tasks = Deliverydetail::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Tracking Number','Order Placement','Vehicle Number','Delivery Charge','Receiver Contact');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Tracking Number']  = $task->trackingno;
                $row['Order Placement']    = $task->orderplacement;
                $row['Vehicle Number']    = $task->vehicleno;
                $row['Delivery Charge']  = $task->deliverycharge;
                $row['Receiver Contact']  = $task->receiversnumber;

                fputcsv($file, array($row['Tracking Number'], $row['Order Placement'], $row['Vehicle Number'], $row['Delivery Charge'], $row['Receiver Contact']));
            }

            fclose($file);
        };
       

        return response()->stream($callback, 200, $headers);



    
    }

}