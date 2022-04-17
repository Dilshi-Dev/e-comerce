<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deliverydetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class DeliverydetailsController extends Controller
{
    public function details()
    {
        $deliverydetails=Deliverydetail::get();
        return view('admin.deliverydetails',compact('deliverydetails'));

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

        $delivery->save();
        Session::flash('message','Delivery Detail Updated Successfully');
        Session::flash('class','success');

        return back();

    }

    public function delete($id){
        $delivery=Deliverydetail::find($id);
        $delivery->delete();
        Session::flash('message','Delivery Detail Deleted Successfully');
        Session::flash('class','danger');

        return back();

    }

    
}