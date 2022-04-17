<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function orderdetails(){
        $order=Order::get();
        return view('admin.ordercreate',compact('order'));
    }

    public function ordersave(Request $request){

        $validatedata=$request->validate([
            'date'=>'required|',
            'ordertypr'=>'required',
            'transactioncode'=>'required',
            'priceperkg'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity'=>'required|integer',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/'

        ]);
        $order=new Order;
        $order->date=$request->input('date');
        $order->ordertypr=$request->input('ordertypr');
        $order->transactioncode=$request->input('transactioncode');
        $order->priceperkg=$request->input('priceperkg');
        $order->quantity=$request->input('quantity');
        $order->price=$request->input('price');


        $order->save();
        Session::flash('message','Order Detail Created Successfully');
        Session::flash('class','success');

        return back();


    }

    public function orderedit($id){
        $order=Order::find($id);

        return view('admin.orderedit',compact('order'));
    }

    public function orderupdate(Request $request){
        $order=Order::find($request->id);
        
        $order->date=$request->input('date');
        $order->ordertypr=$request->input('ordertypr');
        $order->transactioncode=$request->input('transactioncode');
        $order->priceperkg=$request->input('priceperkg');
        $order->quantity=$request->input('quantity');
        $order->price=$request->input('price');


        $order->save();
        Session::flash('message','Order Detail Created Successfully');
        Session::flash('class','success');

        return back();
    }

    public function orderdelete($id){
        $order=Order::find($id);
        $order->delete();

        Session::flash('message','Order Detail Deleted Successfully');
        Session::flash('class','danger');

        return back();
    }
}

