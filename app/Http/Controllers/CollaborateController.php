<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ConvergeLinks;
use App\Models\Headings;
use App\Models\Service;
use App\Models\ServiceLinks;
use Image;
use URL;
use DB;
use App\Http\Controllers\Controller;
use App\Models\PivotFeatures;
use App\Models\PivotImages;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CollaborateController extends Controller
{
    public function collaborate_heading()
    {
        return view('Collaborate.headingIndex');
    }

    public function portfolio_projects()
    {
        $portfolio = Portfolio::where(['priority' => '1', 'deleted_status' => '1'])->orderBy('order_number', 'ASC')->paginate(10);

        return view('Collaborate.portfolio')->with([
            'portfolio' => $portfolio,
        ]);
    }

    public function archive_projects()
    {
        $portfolio = Portfolio::where(['priority' => '2', 'deleted_status' => '1'])->orderBy('year', 'DESC')->paginate(10);
        // return $portfolio;
        return view('Collaborate.archive')->with([
            'portfolio' => $portfolio,
        ]);
    }

    public function collaborate_portfolio(Request $request)
    {
        if ($request->search_project == "") {
            $portfolio = Portfolio::where('deleted_status', '1')->orderBy('id', 'DESC')->paginate(12);
        } else {
            $portfolio = Portfolio::where('deleted_status', '1')
                ->where('title', 'LIKE', '%' . $request->search_project . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        }
        return view('Collaborate.portfolioIndex')->with([
            'portfolio' => $portfolio,
            'search_project' => $request->search_project,
        ]);
    }

    public function add_portfolio()
    {
        $parners = ConvergeLinks::where('deleted_status', '1')->get()->toArray();
        $services = ServiceLinks::where('deleted_status', '1')->get()->toArray();
        return view('Collaborate.addPortfolio')->with([
            'parners' => $parners,
            'services' => $services,
        ]);
    }

    public function save_portfolio(Request $request)
    {
        // echo "<pre>";print_r($request->all()); exit;
        $request->validate([
            'title' => 'required',
            'priority' => '',
            // 'services' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'order_number' => 'sometimes|nullable|required_if:priority,1|integer|unique:portfolio,order_number,NULL,id,priority,1,deleted_status,1',
        ], [
            'title.required' => 'Title field is required.',
            // 'partners.required' => 'Add Atleast 1 Partner.',
            // 'services.required' => 'Add Atleast 1 Service.',
            'year.required' => 'Year field is required.',
            'order_number.integer' => 'The order number must be a Number.',
            'order_number.required_if' => 'The order number field is required When You selected Priority field is Portfolio.',
        ]);

        $portfolio_id = Portfolio::insertGetId([
            'title' => $request->title,
            'content' => $request->content,
            'partners' => $request->partners ? implode(',', $request->partners) : "",
            'services' => $request->services ? implode(',', $request->services) : "",
            'year' => $request->year,
            'priority' => $request->priority,
            'order_number' => $request->priority == '1' ? $request->order_number : "",
            'show_details' => $request->show_details,
            'created_at' => Carbon::now(),
        ]);

        if ($request->file('logo_image')) {
            $image = $request->file('logo_image');
            $logoImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $logoImage);
            Portfolio::where('id', $portfolio_id)->update(['logo_image' => $logoImage]);
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $portfolio_images = [];
            foreach ($image as $value) {
                $portfolioImage = uniqid() . '.' . $value->getClientOriginalExtension();
                $destinationPath = public_path('thumbnail/');
                $img = Image::make($value->getRealPath());
                $img->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $portfolioImage);
                $portfolio_images[] = $portfolioImage;
            }

            foreach ($portfolio_images as $value) {
                PivotImages::insert(['portfolio_id' => $portfolio_id, 'image' => $value, 'created_at' => Carbon::now()]);
            }
        }

        return redirect(route('admin.collaborate_portfolio'))->with('success', "Portfolio has been added Successfully.");

    }

    public function view_portfolio($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        $images = PivotImages::where('portfolio_id', $id)->pluck('image')->toArray();
        return view('Collaborate.view')->with([
            'portfolio' => $portfolio,
            'images' => $images,
        ]);
    }

    public function edit_portfolio($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        $images = PivotImages::where('portfolio_id', $id)->pluck('image')->toArray();
        $parners = ConvergeLinks::where('deleted_status', '1')->get()->toArray();
        $services = ServiceLinks::where('deleted_status', '1')->get()->toArray();
        return view('Collaborate.editPortfolio')->with([
            'portfolio' => $portfolio,
            'images' => $images,
            'parners' => $parners,
            'services' => $services,
        ]);
    }

    public function update_portfolio(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'priority' => '',
            // 'services' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'order_number' => 'sometimes|nullable|required_if:priority,1|integer|unique:portfolio,order_number,' . $id . ',id,priority,1,deleted_status,1',
        ], [
            'title.required' => 'Title field is required.',
            // 'partners.required' => 'Add Atleast 1 Partner.',
            // 'services.required' => 'Add Atleast 1 Service.',
            'year.required' => 'Year field is required.',
            'order_number.integer' => 'The order number must be a Number.',
            'order_number.required_if' => 'The order number field is required When You selected Priority field is Portfolio.',
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->content = $request->content;
        $portfolio->partners = $request->partners ? implode(',', $request->partners) : "";
        $portfolio->services = $request->services ? implode(',', $request->services) : "";
        $portfolio->year = $request->year;
        $portfolio->priority = $request->priority;
        $portfolio->order_number = $request->priority == '1' ? $request->order_number : "";
        $portfolio->show_details = $request->show_details;
        $portfolio->save();
        // echo "<pre>";print_r($portfolio); exit;

        if ($request->file('logo_image')) {
            $image = $request->file('logo_image');
            $logoImage = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('thumbnail/');
            $img = Image::make($image->getRealPath());
            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . $logoImage);
            Portfolio::where('id', $id)->update(['logo_image' => $logoImage]);
        }

        // if ($request->file('image')) {
        //     $image = $request->file('image');
        //     $portfolio_images = [];
        //     foreach ($image as $value) {
        //         $portfolioImage = uniqid() . '.' . $value->getClientOriginalExtension();
        //         $destinationPath = public_path('thumbnail/');
        //         $img = Image::make($value->getRealPath());
        //         $img->resize(1200, 1200, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($destinationPath . $portfolioImage);
        //         $portfolio_images[] = $portfolioImage;
        //     }

        //     foreach ($portfolio_images as $value) {
        //         PivotImages::insert(['portfolio_id' => $id, 'image' => $value, 'created_at' => Carbon::now()]);
        //     }
        // }

        return redirect(route('admin.collaborate_portfolio'))->with('success', "Portfolio has been updated Successfully.");

    }

    public function image_upload(Request $request, $id)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $portfolio_images = [];
            foreach ($image as $value) {
                $portfolioImage = uniqid() . '.' . $value->getClientOriginalExtension();
                $destinationPath = public_path('thumbnail/');
                $img = Image::make($value->getRealPath());
                $img->resize(1200, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . $portfolioImage);
                $portfolio_images[] = $portfolioImage;
            }

            foreach ($portfolio_images as $value) {
                PivotImages::insert(['portfolio_id' => $id, 'image' => $value, 'created_at' => Carbon::now()]);
            }
        }

        return redirect(url('admin/view_portfolio') . '/' . $id)->with('success', "Image/s has been uploaded Successfully.");

    }

    public function deleteImage($id, $image)
    {
        // echo '<pre>';print_r($image);exit;
        $imagePath = public_path('thumbnail/' . $image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        PivotImages::where(['image' => $image])->delete();
        return redirect(url('admin/view_portfolio') . '/' . $id)->with('success', "Image has been deleted Successfully.");
    }

    public function delete_portfolio($id)
    {
        // return $id;
        Portfolio::where('id', $id)->update(['deleted_status' => '0']);

        // $images = PivotImages::where('portfolio_id', $id)->pluck('image')->toArray();
        // foreach ($images as $image) {
        //     $imagePath = public_path('thumbnail/' . $image);
        //     if (file_exists($imagePath)) {
        //         unlink($imagePath);
        //     }
        //     PivotImages::where(['image' => $image])->delete();
        // }
        return redirect(route('admin.collaborate_portfolio'))->with('success', "Portfolio has been deleted Successfully.");
    }

    public function collaborateData()
    {
        $heading = Headings::where('type', 'collaborate')->value('heading');
        $data = Portfolio::where('deleted_status', '1')->get()->toArray();
        // return $data;
        $portfolio = [];
        $archive = [];
        foreach ($data as $value) {
            if ($value['priority'] == '1') {
                $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
                $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
                $images = [];
                foreach ($imageData as $image) {
                    $images[] = URL::asset('thumbnail/' . $image);
                }
                $array = [
                    'title' => $value['title'],
                    'content' => $value['content'],
                    'status' => "Portfolio",
                    'images' => $images,
                    'features' => $features,
                ];
                $portfolio[] = $array;
            }

            if ($value['priority'] == '2') {
                $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
                $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
                $images = [];
                foreach ($imageData as $image) {
                    $images[] = URL::asset('thumbnail/' . $image);
                }
                $array = [
                    'title' => $value['title'],
                    'content' => $value['content'],
                    'status' => "Archive",
                    'images' => $images,
                    'features' => $features,
                ];
                $archive[] = $array;
            }
        }
        return response([
            'status' => 'success',
            'message' => 'Collaborate Data Get Successfully..',
            'data' => [
                'heading' => $heading,
                'portfolioData' => $portfolio,
                'archiveData' => $archive,
            ],
        ], 200);
    }
    public function portfolioData()
    {
        $heading = Headings::where('type', 'collaborate')->value('heading');
        $data = Content::where(['page' => 'collaborate', 'deleted_status' => '1'])->get()->toArray();
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
                    $services = ServiceLinks::select('service_links.title')
                        ->where('deleted_status', '1')
                        ->get()->toArray();
                    $array['description'] = $services;
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
            }elseif ($value['type'] == 'form') {
                $array['type'] = $value['type'];
                $array['description'] = "";
  
            }

            $details[] = $array;
        }
        return response([
            'status' => 'success',
            'message' => 'Portfolio Data Get Successfully..',
            'data' => [
                'heading' => $heading == null ? "" : $heading,
                'details' => $details ? $details : [],
            ],
        ], 200);
    }
    public function archiveData()
    {
        $heading = Headings::where('type', 'cache')->value('heading');
        $array = [];
        $portfolio = Portfolio::where(['priority' => '2', 'deleted_status' => '1'])->orderBy('year', 'ASC')->get()->toArray();
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
            $array[] = [
                'portfolio_title' => $project['title'],
                'content' => $project['content'],
                'year' => $project['year'],
                'services' => $service,
                'partners' => $partner,
                'show_details' => $project['show_details'],
                'images' => $images,
            ];
        }
        return response([
            'status' => 'success',
            'message' => 'Archive Data Get Successfully..',
            'data' => [
                'heading' => $heading == null ? "" : $heading,
                'details' => $array,
            ],
        ], 200);
    }
}