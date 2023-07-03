<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Headings;
use App\Models\Service;
use App\Models\ServiceLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CogitateController extends Controller
{
    public function cogitate_heading()
    {
        return view('Cogitate.headingIndex');
    }

    //  SERVICE PART START
    public function serviceIndex()
    {
        $data = Service::select('*', DB::raw('(SELECT GROUP_CONCAT(service_links.title) FROM service_links WHERE service_links.service_id = services.id) as sub_service'))
            ->where('services.deleted_status', '1')
            ->get()->toArray();
        // return $data;
        return view('Service.index')->with('data', $data);
    }

    public function add_service()
    {
        return view('Service.add');
    }

    public function save_service(Request $request)
    {
        // echo "<pre>";print_r($request->all()); exit;
        $request->validate([
            'service' => 'required|unique:services,service,NULL,id,deleted_status,1',
            'sub_service' => 'required',
        ], [
            'sub_service.required' => 'Add Atleast 1 Sub Services.',
            'service.required' => 'Service field is required.',
            'service.unique' => 'Service is already taken.',
        ]);

        $service_id = Service::insertGetId(['service' => $request->service, 'created_at' => Carbon::now()]);

        $sub_services = explode(',', $request->sub_service);
        foreach ($sub_services as $value) {
            $data = new ServiceLinks;
            $data->service_id = $service_id;
            $data->title = $value;
            // $data->link = $request->link;
            $data->created_at = Carbon::now();
            $data->save();
        }
        return redirect(route('admin.serviceIndex'))->with('success', "Service has been added Successfully.");
    }

    public function edit_service($id)
    {
        $data = Service::where('id', $id)->first();
        $sub_details = ServiceLinks::where('service_id', $id)->pluck('title')->toArray();
        return view('Service.edit')->with([
            'data' => $data,
            'sub_details' => implode(',', $sub_details),
        ]);
    }

    public function update_service(Request $request, $id)
    {
        $request->validate([
            'service' => 'required|unique:services,service,' . $id . ',id,deleted_status,1',
            'sub_service' => 'required',
        ], [
            'sub_service.required' => 'Add Atleast 1 Sub Services.',
            'service.required' => 'Service field is required.',
            'service.unique' => 'Service is already taken.',
        ]);
        // echo "<pre>";print_r($request->all()); exit;
        $service = Service::where('id', $id)->first();
        $service->service = $request->service;
        $service->save();

        $sub_details = ServiceLinks::where('service_id', $id)->delete();
        $sub_services = explode(',', $request->sub_service);
        foreach ($sub_services as $value) {
            $data = new ServiceLinks;
            $data->service_id = $id;
            $data->title = $value;
            // $data->link = $request->link;
            $data->created_at = Carbon::now();
            $data->save();
        }

        return redirect(route('admin.serviceIndex'))->with('success', "Service has been updated Successfully.");
    }

    public function delete_service($id)
    {
        Service::where('id', $id)->update(['deleted_status' => '0']);
        ServiceLinks::where('service_id', $id)->delete();

        return redirect(route('admin.serviceIndex'))->with('success', "Service has been deleted Successfully.");
    }
    //  SERVICE PART END

    //  SERVICE LINK  PART START
    public function serviceLinkIndex()
    {
        $data = ServiceLinks::select('service_links.*', 'services.service')
            ->join('services', 'service_links.service_id', '=', 'services.id')
            ->get()->toArray();

        return view('Cogitate.ServiceLink.index')->with('data', $data);
    }

    public function add_serviceLink()
    {
        $data = Service::all();
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
        $services = Service::all();
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
        $services = Service::all();
        // return $data;
        $data = [];
        foreach ($services as $value) {
            $link_array = [];
            $links = ServiceLinks::where('service_id', $value['id'])->get()->toArray();
            foreach ($links as $link) {
                $array = [
                    'title' => $link['title'],
                    'link' => $link['link'],
                ];
                $link_array[] = $array;
            }

            $service_array = [
                'service_title' => $value['service'],
                'service_links' => $link_array,
            ];
            $data[] = $service_array;
        }
        return response([
            'status' => 'success',
            'message' => 'Cogitate Data Get Successfully..',
            'data' => [
                'heading' => $heading,
                'details' => $data,
            ],
        ], 200);
    }
    // COGITATE API END
}