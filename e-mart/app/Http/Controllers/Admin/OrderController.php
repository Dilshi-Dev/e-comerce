<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function orderdetails(Request $request){
        $search = $request['search'] ?? "";
        if ($search !=""){
            $order=Order::where('date','LIKE',"%$search%")->orWhere('transactioncode','LIKE',"%$search%")->get();
        }else{
            $order=Order::get();
        }
        $data=compact('order','search');
        return view('admin.ordercreate')->with($data);
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


        $order->update();
        Session::flash('message','Order Detail Updated Successfully');
        Session::flash('class','success');

        return redirect('ordermanager');
    }

    public function orderdelete($id){
        $order=Order::find($id);
        $order->delete();

        Session::flash('message','Order Detail Deleted Successfully');
        Session::flash('class','danger');

        return back();
    }

    public function exportOrderCsv(Request $request)
    {
       $fileName = 'order.csv';
       $tasks = Order::all();
    
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = array('Date','Order Type','Transaction Code','Price Per Kg','Quantity','Price');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['Date']  = $task->date;
                    $row['Order Type']    = $task->ordertypr;
                    $row['Transaction Code']    = $task->transactioncode;
                    $row['Price Per Kg']  = $task->priceperkg;
                    $row['Quantity']  = $task->quantity;
                    $row['Price']  = $task->price;
    
                    fputcsv($file, array($row['Date'], $row['Order Type'], $row['Transaction Code'], $row['Price Per Kg'], $row['Quantity'], $row['Price']));
                }
    
                fclose($file);
            };
           
    
            return response()->stream($callback, 200, $headers);
    
    
    
        
        }
}


    
   