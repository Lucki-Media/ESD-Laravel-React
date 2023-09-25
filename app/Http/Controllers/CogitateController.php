<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ConvergeLinks;
use App\Models\Headings;
use App\Models\PivotImages;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use URL;

class CogitateController extends Controller
{
    public function cogitate_heading()
    {
        return view('Cogitate.headingIndex');
    }

    //  SERVICE PART START
    public function serviceIndex()
    {
        $data = ServiceLinks::select('service_links.*', 'services.service')
            ->join('services', 'service_links.service_id', '=', 'services.id')
            ->where('service_links.deleted_status', '1')
            ->get()->toArray();
        // return $data;
        return view('Service.index')->with('data', $data);
    }

    public function add_service()
    {
        $data = Service::where('deleted_status', '1')->get()->toArray();
        return view('Service.add')->with('services', $data);
    }

    public function save_service(Request $request)
    {
        // echo "<pre>";print_r($request->all()); exit;
        $request->validate([
            'service' => 'required',
            'title' => 'required|unique:service_links,title,NULL,id,deleted_status,1',

        ], [
            'service.required' => 'Category field is required.',
            'title.required' => 'Service field is required.',
            'title.unique' => 'Category is already taken.',
        ]);

        $data = new ServiceLinks;
        $data->service_id = $request->service;
        $data->title = $request->title;
        $data->deleted_status = '1';
        $data->created_at = Carbon::now();
        $data->save();
        return redirect(route('admin.serviceIndex'))->with('success', "Service has been added Successfully.");
    }

    public function edit_service($id)
    {
        $services = Service::where('deleted_status', '1')->get()->toArray();
        $data = ServiceLinks::select('service_links.*', 'services.service')
            ->join('services', 'service_links.service_id', '=', 'services.id')
            ->where('service_links.id', $id)
            ->where('service_links.deleted_status', '1')
            ->first();
        return view('Service.edit')->with([
            'services' => $services,
            'data' => $data,
        ]);
    }

    public function update_service(Request $request, $id)
    {
        $request->validate([
            'service' => 'required',
            'title' => 'required|unique:service_links,title,' . $id . ',id,deleted_status,1',

        ], [
            'service.required' => 'Category field is required.',
            'title.required' => 'Service field is required.',
            'title.unique' => 'Category is already taken.',
        ]);

        $data = ServiceLinks::where('id', $id)->first();
        $data->service_id = $request->service;
        $data->title = $request->title;
        $data->deleted_status = '1';
        $data->created_at = Carbon::now();
        $data->save();

        return redirect(route('admin.serviceIndex'))->with('success', "Service has been updated Successfully.");
    }

    public function delete_service($id)
    {
        ServiceLinks::where('id', $id)->update(['deleted_status' => '0']);

        return redirect(route('admin.serviceIndex'))->with('success', "Service has been deleted Successfully.");
    }
    //  SERVICE PART END

    //  SERVICE LINK  PART START  // NOT MORE IN USE
    public function serviceLinkIndex()
    {
        $data = ServiceLinks::select('service_links.*', 'services.service')
            ->join('services', 'service_links.service_id', '=', 'services.id')
            ->get()->toArray();

        return view('Cogitate.ServiceLink.index')->with('data', $data);
    }

    public function add_serviceLink()
    {
        $data = Service::where('deleted_status', '1')->get()->toArray();
        return view('Cogitate.ServiceLink.add')->with('services', $data);
    }

    public function save_serviceLink(Request $request)
    {
        // return $request;
        $request->validate([
            'service' => 'required',
            'title' => 'required',
            'link' => 'required|url',
        ], [
            'service.required' => 'Service field is required.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
        ]);

        $data = new ServiceLinks;
        $data->service_id = $request->service;
        $data->title = $request->title;
        $data->link = $request->link;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect(route('admin.serviceLinkIndex'))->with('success', "Service Link has been added Successfully.");
    }

    public function edit_serviceLink($id)
    {
        $services = Service::where('deleted_status', '1')->get()->toArray();
        $data = ServiceLinks::select('service_links.*', 'services.service')
            ->join('services', 'service_links.service_id', '=', 'services.id')
            ->where('service_links.id', $id)
            ->first();
        return view('Cogitate.ServiceLink.edit')->with([
            'services' => $services,
            'data' => $data,
        ]);
    }

    public function update_serviceLink(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'service' => 'required',
            'title' => 'required',
            'link' => 'required|url',
        ], [
            'service.required' => 'Service field is required.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
        ]);

        $data = ServiceLinks::where('id', $id)->first();
        $data->service_id = $request->service;
        $data->title = $request->title;
        $data->link = $request->link;
        $data->save();
        return redirect(route('admin.serviceLinkIndex'))->with('success', "Service Link has been updated Successfully.");
    }

    public function delete_serviceLink($id)
    {
        ServiceLinks::where('id', $id)->delete();

        return redirect(route('admin.serviceLinkIndex'))->with('success', "Service Link has been deleted Successfully.");
    }
    //  SERVICE LINK  PART END

    // COGITATE API START
    public function cogitateData()
    {
        $heading = Headings::where('type', 'cogitate')->value('heading');
        $data = Content::where(['page' => 'cogitate', 'deleted_status' => '1'])->get()->toArray();
        // return $data;
        $details = [];

        foreach ($data as $key => $value) {
            $array = [];
            $array['id'] = $value['id'];
            $array['title'] = $value['title'] == null ? "" : $value['title'];
            if ($value['type'] == 'content') {
                $array['type'] = $value['type'];
                // Remove <p></p>
                $content = str_replace('<p></p>', '', $value['description']);

                // Remove <p><br></p>
                $content = str_replace('<p><br></p>', '', $content);
                $array['description'] = $content;
            } elseif ($value['type'] == 'module')  {
                if ($value['module'] == 'portfolio') {
                    $array['type'] = $value['module'];
                    $portfolio = Portfolio::where(['priority' => '1', 'deleted_status' => '1'])->orderBy('order_number', 'ASC')->get()->toArray();
                    foreach ($portfolio as $project) {
                        $imageData = PivotImages::where('portfolio_id', $project['id'])->pluck('image')->toArray();
                        $images = [];
                        $service = [];
                        $partner = [];

                        // Remove <p></p>
                        $content = str_replace('<p></p>', '', $project['content']);

                        // Remove <p><br></p>
                        $content = str_replace('<p><br></p>', '', $content);


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
                            'content' => $content,
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
        return response([
            'status' => 'success',
            'message' => 'Cogitate Data Get Successfully..',
            'data' => [
                'heading' => $heading == null ? "" : $heading,
                'details' => $details ? $details : [],
            ],
        ], 200);
    }
    // COGITATE API END
}