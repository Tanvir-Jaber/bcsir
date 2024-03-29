<?php

namespace App\Http\Controllers;

use App\Models\QrData;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;
use File;
use Storage;
use Validator;

class QrDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $image_loc = 'https://bcsir.rcreation-bd.com/public/qr-logo-1.png';
    public function index()
    {
        
        $data = QrData::where('department_id',auth()->user()->department_id)->latest()->get();
        if (auth()->user()->user_type != 3) {
            $data = QrData::latest()->get();
        }

        return view('staff.qr.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::pluck('title','id');
        return view('staff.qr.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'issue_date' => 'required',
            // 'header' => 'required',
            'title' => 'required',
            'ref_no' => 'required',
            // 'description' => 'required',
            // 'footer' => 'required',
        ];
        if(auth()->user()->user_type != 3){
            $rules = [
                'issue_date' => 'required',
                // 'header' => 'required',
                'title' => 'required',
                // 'description' => 'required',
                // 'footer' => 'required',
                'department_id' => 'required',
                'ref_no' => 'required',
            ];
        }

        $dep_title = $request->department_id ? Department::find($request->department_id)->title : auth()->user()->department->title;

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['errors' => $validator->errors()]);
        }

        try {
            $request['token'] = $this->generateRandomString();
            $request['user_id'] = auth()->user()->id;
            $request['department_id'] = $request->department_id ? $request->department_id : auth()->user()->department_id;
            $qr_id = QrData::create($request->all());

            $info  = "Title: ".$request->title;
            $info .= "\nDepartment: ".$dep_title;
            $info .= "\nGenerated By: ".auth()->user()->username;
            $info .= "\nUser ID: ".auth()->user()->email;
            $info .= "\nReference No: ".$request->ref_no;
            $info .= "\nCode: #".$qr_id->id.'-'.$request['token'];
            $info .= "\nDate: ".$request->issue_date;
            $info .= "\nBangladesh Council of Scientific  and Industrial Research (BCSIR)";
           
            $data = QrCode::size(512)
                ->encoding('UTF-8')
                ->format('png')
                ->merge($this->image_loc, 0.3, true)->size(1080)
                ->errorCorrection('M')
                ->generate($info);
            
            $output_file = '/qr-code/img-' . time() . '.png';
            Storage::disk('local')->put($output_file, $data);
            File::copy(storage_path('app') . $output_file, public_path($output_file));
            QrData::find($qr_id->id)->update([
                "image" => $output_file
            ]);
           
            return redirect()
                ->back()
                ->with(['success' => 'Qr Code Created Successfully.']);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(QrData $qrData)
    {
       
        return view('staff.qr.edit',compact('qrData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, QrData $qrData)
    {
        $data = QrData::find($request->qr);
        return view('staff.qr.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrData $qrData)
    {
        $rules = [
            // 'name' => 'required',
            // 'header' => 'required',
            'title' => 'required',
            // 'description' => 'required',
            // 'footer' => 'required',
            'ref_no' => 'required',
            'issue_date' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with(['errors' => $validator->errors()]);
        }

        try {
            $qr_details = QrData::find($request->qr);
            // $info  = "Name: ".$request->name;
            $info  = "Title: ".$request->title;
            $info .= "\nDepartment: ".$qr_details->department->title;
            $info .= "\nGenerated By: ".$qr_details->user->username;
            $info .= "\nUser ID: ".$qr_details->user->email;
            $info .= "\nReference No: ".$request->ref_no;
            $info .= "\nCode: #".$qr_details->id.'-'.$qr_details->token;
            $info .= "\nDate: ".$request->issue_date;
            // $info .= "\nDate: ".date('Y-m-d',strtotime($qr_details->created_at));
            // $info .= "\n".$request->header;
            // $info .= "\n".$request->title;
            // $info .= "\n".$request->description;
            $info .= "\nBangladesh Council of Scientific  and Industrial Research (BCSIR)";



        
           
            $data = QrCode::size(512)
                ->encoding('UTF-8')
                ->format('png')
                ->merge($this->image_loc, 0.3, true)->size(1080)
                ->errorCorrection('M')
                ->generate($info);

            $output_file = '/qr-code/img-' . time() . '.png';
            Storage::disk('local')->put($output_file, $data);
            File::copy(storage_path('app') . $output_file, public_path($output_file));
            $request['image'] = $output_file;

            $qr_details->update($request->all());
            return redirect()
                ->back()
                ->with(['success' => 'Qr Code Updated Successfully.']);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,QrData $qrData)
    {
    
        QrData::find($request->qr)->delete();
        return ['msg' => "success"];
    }

    public function  token_view(Request $request){

        $user = User::find(auth()->user()->id);
        if(Hash::check($request->pass,$user->password)){
            return QrData::find($request->qr_id)->token;
        }
        return 0;
    }
    function generateRandomString($length = 11) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $check = QrData::where('token',$randomString)->exists();
        if($check){
            return $this->generateRandomString();
        }

        return $randomString;
    
    }
}
