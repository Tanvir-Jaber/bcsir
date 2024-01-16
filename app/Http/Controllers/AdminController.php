<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Exception;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('user_type',2)->get();
        return view('admin.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'first_name.required'    => 'First Name Should Be Required',
            'last_name.required'     => 'Last Name Should Be Required',
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $request['status'] = 1;
            $request['username'] = $request->first_name.' '.$request->last_name;
            $request['user_type'] = 2;
            $request['password'] = Hash::make($request->password);
            User::create($request->all());
            return redirect()->back()->with(["success" => "Admin Created Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        return view('admin.edit',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('admin.edit',compact('data'));
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
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $request['username'] = $request->first_name.' '.$request->last_name;
            User::find($id)->update($request->all());
            return redirect()->back()->with(["success" => "Admin Updated Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return ['msg' => 'success'];
    }
}
