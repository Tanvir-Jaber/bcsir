<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Exception;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::all();
        return view('department.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

 
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'code' => 'required',
        ];

        $message = [
            'title.unique'      => 'Department Name should be unique',
            'title.required'    => 'Department Name Should Be Required',
            // 'code.unique'       => 'Department Code should be unique',
            'code.required'     => 'Department Code Should Be Required',
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            Department::create($request->all());
            return redirect()->back()->with(["success" => "Department Created Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $rules = [
            'title' => 'required',
            'code' => 'required',
        ];

        $message = [
            // 'title.unique'      => 'Department Name should be unique',
            'title.required'    => 'Department Name Should Be Required',
            // 'code.unique'       => 'Department Code should be unique',
            'code.required'     => 'Department Code Should Be Required',
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->with(["errors" => $validator->errors()]);
        }

        try {
            $department->update($request->all());
            return redirect()->back()->with(["success" => "Department Updated Successfully."]);
        } catch (Exception $e) {
            return redirect()->back()->with(["errors" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return ['msg' => "success"];
    }
}
