<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Communicate;
use App\Models\Headings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class CommunicateController extends Controller
{
    public function communicate_message()
    {
        $data = Communicate::all();
        return view('Communicate.index')->with('data', $data);
    }

    public function view_data($id)
    {
        $data = Communicate::where('id', $id)->first();
        return view('Communicate.view')->with([
            'data' => $data,
        ]);
    }

    public function communicate_heading()
    {
        return view('Communicate.headingIndex');
    }

    public function communicateData()
    {
        $heading = Headings::where('type', 'communicate')->value('heading');
        return response([
            'status' => 'success',
            'message' => 'Communicate Data Get Successfully..',
            'data' => [
                'heading' => $heading,
            ],
        ], 200);
    }

    public function sendRequest(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|regex:/^\d+$/',
            'company_name' => 'required',
            'project' => 'required',
            'message' => 'required',
        ]);
        if ($validatedData->fails()) {
            $validation_error['status'] = 'fail';
            $validation_error['message'] = implode('|| ', $validatedData->messages()->all());
            $validation_error['data'] = [];
            return response()->json($validation_error, 404);
        }
        // return $request;

        $data = new Communicate;
        $data->full_name = $request->full_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->company_name = $request->company_name;
        $data->project = $request->project;
        $data->message = $request->message;
        $data->created_at = Carbon::now();
        $result = $data->save();

        if($result){
            return response([
                'status' => 'success',
                'message' => 'Data has been sent successfully..',
                'data' => [],
            ], 200);
        }else{
            return response([
                'status' => 'fail',
                'message' => 'Something went wrong',
                'data' => [],
            ], 400);
        }
    }
}
