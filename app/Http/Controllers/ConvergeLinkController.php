<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConvergeLinks;
use App\Models\Portfolio;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConvergeLinkController extends Controller
{
    public function index()
    {
        $link_data = ConvergeLinks::where('deleted_status', '1')->get()->toArray();
        return view('ConvergeLink.index')->with([
            'link_data' => $link_data
        ]);
    }
    public function add()
    {
        // return view('ConvergeLink.add');
        $services = Service::where('deleted_status', '1')->get()->toArray();
        $projects = Portfolio::all();
        return view('ConvergeLink.add')->with([
            'services' => $services,
            'projects' => $projects
        ]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'partner' => 'required|unique:partners,partner,NULL,id,deleted_status,1',
            'link' => 'required|url',
            'location' => 'required',
            // 'year' => 'required',
            'services' => 'required',
            'projects' => 'required',
        ], [
            'partner.required' => 'Partner field is required.',
            'partner.unique' => 'Partner is already taken.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
            // 'year.required' => 'Year field is required.',
            'services.required' => 'Choose Atleast one service.',
            'projects.required' => 'Choose Atleast one project.',
        ]);
        // return implode(',', $request->services);

        $data = new ConvergeLinks;
        $data->partner = $request->partner;
        $data->link = $request->link;
        $data->location = $request->location;
        // $data->year = $request->year;
        $data->services = implode(',', $request->services);
        $data->projects = implode(',', $request->projects);
        $data->created_at = Carbon::now();
        $data->deleted_status = '1';
        $data->save();
        return redirect(route('admin.partners-index'))->with('success', "Partner has been added Successfully.");
    }

    public function edit($id)
    {
        // return $id;
        $data = ConvergeLinks::where('id', $id)->first();
        $services = Service::where('deleted_status', '1')->get()->toArray();
        $projects = Portfolio::all();
        return view('ConvergeLink.edit')->with([
            'data' => $data,
            'services' => $services,
            'projects' => $projects
        ]);
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'partner' => 'required|unique:partners,partner,' . $id . ',id,deleted_status,1',
            'link' => 'required|url',
            'location' => 'required',
            // 'year' => 'required',
            'services' => 'required',
            'projects' => 'required',
        ], [
            'partner.required' => 'Partner field is required.',
            'partner.unique' => 'Partner is already taken.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
            // 'year.required' => 'Year field is required.',
            'services.required' => 'Choose Atleast one service.',
            'projects.required' => 'Choose Atleast one project.',
        ]);

        $data = ConvergeLinks::where('id', $id)->first();
        $data->partner = $request->partner;
        $data->link = $request->link;
        $data->location = $request->location;
        // $data->year = $request->year;
        $data->services = implode(',', $request->services);
        $data->projects = implode(',', $request->projects);
        $data->created_at = Carbon::now();
        $data->deleted_status = '1';
        $data->save();

        return redirect(route('admin.partners-index'))->with('success', "Partner has been updated Successfully.");
    }

    public function delete($id)
    {
        // return $id;
        $data = ConvergeLinks::where('id', $id)->update(['deleted_status' => '0']);
        return redirect(route('admin.partners-index'))->with('success', "Partner has been deleted Successfully.");
    }

}