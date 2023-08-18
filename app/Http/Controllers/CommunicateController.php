<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Communicate;
use App\Models\Content;
use App\Models\ConvergeLinks;
use App\Models\Headings;
use App\Models\PivotImages;
use App\Models\Portfolio;
use App\Models\ServiceLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use URL;
use Validator;

class CommunicateController extends Controller
{
    public function messageData($id)
    {
        $data = Communicate::all()->toArray();

        switch ($id) {
            case 'all':
                $data = Communicate::all()->toArray();
                break;
            case '1':
                $data = Communicate::where('project', '1')->get()->toArray();
                break;
            case '2':
                $data = Communicate::where('project', '2')->get()->toArray();
                break;
            case '3':
                $data = Communicate::where('project', '3')->get()->toArray();
                break;
            case '4':
                $data = Communicate::where('project', '4')->get()->toArray();
                break;
            default:
                $data = Communicate::all()->toArray();
                break;
        }

        return response()->json($data);
    }

    public function messageDetails($id)
    {
        $data = Communicate::where('id', $id)->first();
        $data->read_status = '0';
        $data->save();
        return response()->json($data);
    }

    public function communicate_message()
    {
        $data = Communicate::all();
        return view('Communicate.index')->with('data', $data);
    }

    public function update_readStatus()
    {
        $data = Communicate::query()->update(['read_status' => '0']);
        return redirect(route('admin.communicate_message'));
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
        $data = Content::where(['page' => 'communicate', 'deleted_status' => '1'])->get()->toArray();
        $details = [];

        // return $data;

        foreach ($data as $key => $value) {
            $array = [];
            $array['id'] = $value['id'];
            $array['title'] = $value['title'] == null ? "" : $value['title'];
            if ($value['type'] == 'content') {
                $array['type'] = $value['type'];
                $array['description'] = $value['description'];
            } elseif ($value['type'] == 'module') {
                if ($value['module'] == 'portfolio') {
                    $array['type'] = $value['module'];
                    $portfolio = Portfolio::where(['priority' => '1', 'deleted_status' => '1'])->orderBy('order_number', 'ASC')->get()->toArray();
                    foreach ($portfolio as $project) {
                        $imageData = PivotImages::where('portfolio_id', $project['id'])->pluck('image')->toArray();
                        $images = [];
                        $service = [];
                        $partner = [];
                        foreach ($imageData as $image) {
                            $images[] = URL::asset('thumbnail/' . $image);
                        }

                        foreach (explode(',', $project['services']) as $service_id) {
                            $service[] = ServiceLinks::where('id', $service_id)->value('title');
                        }

                        foreach (explode(',', $project['partners']) as $partner_id) {
                            $partner[] = ConvergeLinks::where('id', $partner_id)->select('partner as partner_title', 'link as partner_link')->first();
                        }
                        $array['description'][] = [
                            'portfolio_title' => $project['title'],
                            'content' => $project['content'],
                            'year' => $project['year'],
                            'services' => $service,
                            'partners' => $partner,
                            'show_details' => $project['show_details'],
                            'images' => $images,
                        ];
                    }
                }
                if ($value['module'] == 'service') {
                    $array['type'] = $value['module'];
                    $services = Service::where('deleted_status', '1')
                    ->get()->toArray();

                    foreach ($services as $sub_service) {
                        $subService = ServiceLinks::where('deleted_status', '1')
                        ->where('service_id', $sub_service['id'])
                        ->pluck('title')->toArray();

                        if ($subService) {
                            $array['description'][] = [
                                'service_title' => $sub_service['service'],
                                'sub_services' => $subService,
                            ];
                        }
                    }

                }
                if ($value['module'] == 'partner') {
                    $array['type'] = $value['module'];
                    $partner_data = ConvergeLinks::where('deleted_status', '1')->get()->toArray();
                    foreach ($partner_data as $partner_arr) {
                        $service = [];
                        $projects = [];

                        foreach (explode(',', $partner_arr['services']) as $service_id) {
                            $service[] = ServiceLinks::where('id', $service_id)->value('title');
                        }
                        foreach (explode(',', $partner_arr['projects']) as $project_id) {
                            $projects[] = Portfolio::where('id', $project_id)->value('title');
                        }
                        $array['description'][] = [
                            'partner' => $partner_arr['partner'],
                            'link' => $partner_arr['link'],
                            'location' => $partner_arr['location'],
                            'services' => $service,
                            'projects' => $projects,
                        ];
                    }
                }
                if ($value['module'] == 'archive') {
                    $array['type'] = $value['module'];
                    $array['description'] = [];
                }
            }elseif ($value['type'] == 'form') {
                $array['type'] = $value['type'];
                $array['description'] = "";
  
            }
            $details[] = $array;
        }

        // return $transformedArray;
        return response([
            'status' => 'success',
            'message' => 'Communicate Data Get Successfully..',
            'data' => [
                'heading' => $heading == null ? "" : $heading,
                'details' => $details ? $details : [],
            ],
        ], 200);
    }

    public function sendRequest(Request $request)
    {
        // project  == 1 -> BRAND & COMMS , 2 -> WEB & MOBILE , 3 -> SPACE & EXPERIENCE , 4 -> OTHER
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
