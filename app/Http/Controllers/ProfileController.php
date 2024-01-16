<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::find(auth()->user()->id);
        $departments = Department::pluck('title','id');
        return view('profile.update',compact('data','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
        ];

        $message = [
            'first_name.required'    => 'First Name Should Be Required',
            'last_name.required'     => 'Last Name Should Be Required',
            'department_id.required'     => 'Department Should Be Required',
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $request['username'] = $request->first_name.' '.$request->last_name;
            User::find($id)->update($request->all());
            return redirect()->back()->with(["success" => "Staff Updated Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    public function change_password(Request $request){
        $rules = [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $request['password'] = Hash::make($request->password);
            $user = User::find(auth()->user()->id);
            
            $status = ['errors' => "You Have Provided Incorrect Old Password."];
            if(Hash::check($request->old_password,$user->password)){
                unset($request['old_password'],$request['password_confirmation']);
                $user->update($request->all());
                $status = ['success' => "Change Password Successfully"];
                // dd($status);
            }
            
            return redirect()->back()->with($status);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
        ];

        $message = [
            'first_name.required'    => 'First Name Should Be Required',
            'last_name.required'     => 'Last Name Should Be Required',
        ];
        if(auth()->user()->user_type == 3){
            $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
            ];
    
            $message = [
                'first_name.required'    => 'First Name Should Be Required',
                'last_name.required'     => 'Last Name Should Be Required',
                'department_id.required'     => 'Department Should Be Required',
            ];
        }
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $request['username'] = $request->first_name.' '.$request->last_name;
            User::find($id)->update($request->all());
            return redirect()->back()->with(["success" => "Profile Updated Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
