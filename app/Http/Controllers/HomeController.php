<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QrData;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $type = auth()->user()->user_type;
        $data = User::where('user_type',3)->get();
        if ($type == 1) {
            $view = "super_admin.home";
            
        }
        elseif($type == 2){
            $view = "admin.home";
        }
        else{
            $data = QrData::where('department_id',auth()->user()->department_id)->latest()->get();
            $view = "staff.home";
        }

        return view($view,compact('data'));
    }
    public function printable(Request $request){
        $data = QrData::findorFail($request->id);
        return view('print',compact('data'));
    }
}
