<?php

namespace App\Http\Controllers\Admin;

use app\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function registered(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search !=""){
            $users=User::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->get();
        }else{
            $users=User::get();
        }
        $data=compact('users','search');
        return view('admin.register')->with($data);
    }



    public function registeredit(Request $request,$id)
    {
        $users=User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);

    }

    public function registerupdate(Request $request,$id)
    {
        $users=User::find($id);
        $users->name=$request->input('name');
        $users->phone=$request->input('phone');
        $users->email=$request->input('email');
        $users->usertype=$request->input('usertype');
        $users->update();
        Session::flash('message','User Updated Successfully');
        Session::flash('class','success');

        return redirect('/role-register');

        // return redirect('/role-register')->with('status','Your data is updated');


        

    }

    public function registerdelete($id){
        $users=User::findOrFail($id);
        $users->delete();

        Session::flash('message','User Deleted Successfully');
        Session::flash('class','danger');

        return redirect('/role-register');



    }
    public function exportCsv(Request $request)
    {
       $fileName = 'user.csv';
       $tasks =User::all();
    
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = array('ID','Name','	Phone','Email','Usertype');
    
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);
    
                foreach ($tasks as $task) {
                    $row['ID']  = $task->id;
                    $row['Name']    = $task->name;
                    $row['Phone']    = $task->phone;
                    $row['Email']  = $task->email;
                    $row['Usertype']  = $task->usertype;
    
                    fputcsv($file, array($row['ID'], $row['Name'], $row['Phone'], $row['Email'], $row['Usertype']));
                }
                
                fclose($file);
            };
           
    
            return response()->stream($callback, 200, $headers);
    
    
    
        
        }
}

                            