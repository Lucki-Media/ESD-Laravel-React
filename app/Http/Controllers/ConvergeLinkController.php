<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConvergeLinks;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use URL;
use Image;
class ConvergeLinkController extends Controller
{
    public function partnerData()
    {
        $partner_data = ConvergeLinks::where('deleted_status', '1')->orderBy('id', 'DESC')->get()->toArray();
        $data=[];
        foreach ($partner_data as $key => $value) {
            $data[] = [
                'id' => $value['id'],
                'coverImg' => $value['cover_image'] == null ? URL::asset('images/background.jpg') : URL::asset('thumbnail/' . $value['cover_image']),
                'memberImg' => $value['logo_image'] == null ? '' : URL::asset('thumbnail/'. $value['logo_image']),
                'nickname' => strtoupper(substr($value['partner'], 0, 2)),
                'memberName' => $value['partner'],
                'position' => $value['location'],
                'projects' => count(explode(',',$value['projects'])),
                'tasks' => count(explode(',', $value['services'])),
                'edit_link' => url('admin/edit_link/' . $value['id']),
                'delete_link' => url('admin/delete_link/' . $value['id']),
                'view_link' => url('admin/view_partner/' . $value['id']),
            ];
        }
        // return $data;
        return response()->json($data);
    }
    
    public function index(Request $request)
    {
        $link_data = ConvergeLinks::where('deleted_status', '1')->orderBy('id', 'DESC')->paginate(12);
        return view('Partners.index')->with([
            'link_data' => $link_data,
        ]);
    }
    public function add()
    {
        // return view('Partners.add');
        $services = ServiceLinks::where('deleted_status', '1')->get()->toArray();
        $projects = Portfolio::where('deleted_status', '1')->get()->toArray();
        return view('Partners.add')->with([
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
            // 'services' => 'required',
            // 'projects' => 'required',
        ], [
            'partner.required' => 'Partner Name field is required.',
            'partner.unique' => 'Partner Name is already taken.',
            'link.required' => 'Website Link field is required.',
            'link.url' => 'Website Link field must be a valid URL.',
            'location.required' => 'City field is required.',
            // 'services.required' => 'Choose Atleast one service.',
            // 'projects.required' => 'Choose Atleast one project.',
        ]);
        // return implode(',', $request->services);

        $partner_id = ConvergeLinks::insertGetId([
        'partner'               => $request->partner,
        'link'                  => $request->link,
        'contact'               => $request->contact,
        'email'                 => $request->email,
        'services'              => $request->services ? implode(',', $request->services) : "",
        'projects'              =>  $request->projects ? implode(',', $request->projects) : "",
        'location'              => $request->location,
        'country'               => $request->country,
        'zip'                   => $request->zip,
        'git'                   => $request->git,
        'twitter'               => $request->twitter,
        'facebook'              => $request->facebook,
        'instagram'             => $request->instagram,
        'created_at'            => Carbon::now(),
        'deleted_status'        => '1',
        ]);

        if ($request->file('logo_image')) {
            $image = $request->file('logo_image');
            $logoImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $logoImage);
            ConvergeLinks::where('id', $partner_id)->update(['logo_image' => $logoImage]);
        }

        if ($request->file('cover_image')) {
            $image = $request->file('cover_image');
            $coverImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $coverImage);
            ConvergeLinks::where('id', $partner_id)->update(['cover_image' => $coverImage]);
        }

        return redirect(route('admin.partners-index'))->with('success', "Partner has been added Successfully.");
    }

    public function view_partner($id)
    {
        // return $id;
        $data = ConvergeLinks::where('id', $id)->first();
        return view('Partners.view')->with([
            'data' => $data,
        ]);
    }

    public function edit($id)
    {
        // return $id;
        $data = ConvergeLinks::where('id', $id)->first();
        $services = ServiceLinks::where('deleted_status', '1')->get()->toArray();
        $projects = Portfolio::where('deleted_status', '1')->get()->toArray();
        return view('Partners.edit')->with([
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
            // 'services' => 'required',
            // 'projects' => 'required',
        ], [
            'partner.required' => 'Partner Name field is required.',
            'partner.unique' => 'Partner Name is already taken.',
            'link.required' => 'Website Link field is required.',
            'link.url' => 'Website Link field must be a valid URL.',
            'location.required' => 'City field is required.',   
            // 'services.required' => 'Choose Atleast one service.',
            // 'projects.required' => 'Choose Atleast one project.',
        ]);

        $data = ConvergeLinks::where('id', $id)->first();
        $data->partner = $request->partner;
        $data->link = $request->link;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->services = $request->services ? implode(',', $request->services) : "";
        $data->projects = $request->projects ? implode(',', $request->projects) : "";
        $data->location = $request->location;
        $data->country = $request->country;
        $data->zip = $request->zip;
        $data->git = $request->git;
        $data->twitter = $request->twitter;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->save();

        if ($request->file('logo_image')) {
            $image = $request->file('logo_image');
            $logoImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $logoImage);
            ConvergeLinks::where('id', $id)->update(['logo_image' => $logoImage]);
        }

        if ($request->file('cover_image')) {
            $image = $request->file('cover_image');
            $coverImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $coverImage);
            ConvergeLinks::where('id', $id)->update(['cover_image' => $coverImage]);
        }


        return redirect(route('admin.partners-index'))->with('success', "Partner has been updated Successfully.");
    }

    public function delete($id)
    {
        // return $id;
        $data = ConvergeLinks::where('id', $id)->update(['deleted_status' => '0']);
        return redirect(route('admin.partners-index'))->with('success', "Partner has been deleted Successfully.");
    }

}