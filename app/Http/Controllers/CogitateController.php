<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Headings;
use App\Models\Service;
use App\Models\ServiceLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CogitateController extends Controller
{
    public function cogitate_heading()
    {
        return view('Cogitate.headingIndex');
    }

    //  SERVICE PART START
    public function serviceIndex()
    {
        $data = Service::all();
        return view('Cogitate.Service.index')->with('data', $data);
    }

    public function add_service()
    {
        return view('Cogitate.Service.add');
    }

    public function save_service(Request $request)
    {
        $request->validate([
            'service' => 'required|unique:services,service,NULL,id',
        ], [
            'service.required' => 'Service field is required.',
            'service.unique' => 'Service is already taken.',
        ]);
        // echo "<pre>";print_r($request->all()); exit;

        Service::insert(['service' => $request->service, 'created_at' => Carbon::now()]);
        return redirect(route('admin.serviceIndex'))->with('success', "Service has been added Successfully.");
    }

    public function edit_service($id)
    {
        $data = Service::where('id', $id)->first();
        return view('Cogitate.Service.edit')->with([
            'data' => $data,
        ]);
    }

    public function update_service(Request $request, $id)
    {
        $request->validate([
            'service' => 'required|unique:services,service,'.$id.',id',
        ], [
            'service.required' => 'Service field is required.',
            'service.unique' => 'Service is already taken.',
        ]);
        // echo "<pre>";print_r($request->all()); exit;
        $service = Service::where('id', $id)->first();
        $service->service = $request->service;
        $service->save();
        return redirect(route('admin.serviceIndex'))->with('success', "Service has been updated Successfully.");
    }

    public function delete_service($id)
    {
        Service::where('id', $id)->delete();
        ServiceLinks::where('service_id', $id)->delete();

        return redirect(route('admin.serviceIndex'))->with('success', "Service has been deleted Successfully.");
    }
    //  SERVICE PART END

    //  SERVICE LINK  PART START
    public function serviceLinkIndex()
    {
        $data = ServiceLinks::select('service_links.*','services.service')
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

        $data = ServiceLinks::where('id',$id)->first();
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
                    'title'     => $link['title'],
                    'link'      => $link['link'],
                ];
                $link_array[] = $array;
            }

            $service_array = [
                'service_title'     => $value['service'],
                'service_links'     => $link_array,
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
