<?php

namespace App\Http\Controllers;

use App\Models\ConvergeLinks;
use App\Models\Headings;
use App\Models\Service;
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

    public function collaborate_portfolio()
    {
        $portfolio = Portfolio::where('deleted_status', '1')->get()->toArray();
        return view('Collaborate.portfolioIndex')->with([
            'portfolio' => $portfolio,
        ]);
    }

    public function add_portfolio()
    {
        $parners = ConvergeLinks::where('deleted_status', '1')->get()->toArray();
        $services = Service::where('deleted_status', '1')->get()->toArray();
        return view('Collaborate.addPortfolio')->with([
            'parners' => $parners,
            'services' => $services,
        ]);
    }

    public function save_portfolio(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'partners' => 'required',
            // 'services' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ], [
            'title.required' => 'Title field is required.',
            // 'partners.required' => 'Add Atleast 1 Partner.',
            // 'services.required' => 'Add Atleast 1 Service.',
            'year.required' => 'Year field is required.',
        ]);
        // echo "<pre>";print_r($request->all()); exit;

        $portfolio_id = Portfolio::insertGetId([
            'title' => $request->title,
            'content' => $request->content,
            'partners' => implode(',', $request->partners),
            'services' => implode(',', $request->services),
            'year' => $request->year,
            'status' => $request->status,
            'show_details' => $request->show_details,
            'created_at' => Carbon::now(),
        ]);

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
        $services = Service::where('deleted_status', '1')->get()->toArray();
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
            // 'partners' => 'required',
            // 'services' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ], [
            'title.required' => 'Title field is required.',
            // 'partners.required' => 'Add Atleast 1 Partner.',
            // 'services.required' => 'Add Atleast 1 Service.',
            'year.required' => 'Year field is required.',
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->content = $request->content;
        $portfolio->partners = implode(',', $request->partners);
        $portfolio->services = implode(',', $request->services);
        $portfolio->year = $request->year;
        $portfolio->status = $request->status;
        $portfolio->show_details = $request->show_details;
        $portfolio->save();
        // echo "<pre>";print_r($portfolio); exit;

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

        return redirect(route('admin.collaborate_portfolio'))->with('success', "Portfolio has been updated Successfully.");

    }

    public function deleteImage($id, $image)
    {
        // echo '<pre>';print_r($image);exit;
        $imagePath = public_path('thumbnail/' . $image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        PivotImages::where(['image' => $image])->delete();
        return redirect(url('admin/edit_portfolio') . '/' . $id)->with('success', "Image has been deleted Successfully.");
    }

    public function delete_portfolio($id)
    {
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
        $data = Portfolio::all();
        // return $data;
        $portfolio = [];
        $archive = [];
        foreach ($data as $value) {
            if ($value['status'] == 'portfolio') {
                $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
                $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
                $images = [];
                foreach ($imageData as $image) {
                    $images[] = URL::asset('thumbnail/' . $image);
                }
                $array = [
                    'title' => $value['title'],
                    'content' => $value['content'],
                    'status' => $value['status'],
                    'images' => $images,
                    'features' => $features,
                ];
                $portfolio[] = $array;
            }

            if ($value['status'] == 'archive') {
                $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
                $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
                $images = [];
                foreach ($imageData as $image) {
                    $images[] = URL::asset('thumbnail/' . $image);
                }
                $array = [
                    'title' => $value['title'],
                    'content' => $value['content'],
                    'status' => $value['status'],
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
        $heading = Headings::where('type', 'collaborate_portfolio')->value('heading');
        $data = Portfolio::where('deleted_status', '1')->where('status', 'portfolio')->get()->toArray();
        // return $data;
        $portfolio = [];
        foreach ($data as $value) {
            $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
            $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
            $images = [];
            foreach ($imageData as $image) {
                $images[] = URL::asset('thumbnail/' . $image);
            }
            $array = [
                'title' => $value['title'],
                'content' => $value['content'],
                'status' => $value['status'],
                'images' => $images,
                'features' => $features,
            ];
            $portfolio[] = $array;
        }
        return response([
            'status' => 'success',
            'message' => 'Portfolio Data Get Successfully..',
            'data' => [
                'heading' => $heading,
                'portfolioData' => $portfolio,
            ],
        ], 200);
    }
    public function archiveData()
    {
        $heading = Headings::where('type', 'collaborate_archive')->value('heading');
        $data = Portfolio::where('deleted_status', '1')->where('status', 'archive')->get()->toArray();
        // return $data;
        $archive = [];
        foreach ($data as $value) {
            $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
            $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
            $images = [];
            foreach ($imageData as $image) {
                $images[] = URL::asset('thumbnail/' . $image);
            }
            $array = [
                'title' => $value['title'],
                'content' => $value['content'],
                'status' => $value['status'],
                'images' => $images,
                'features' => $features,
            ];
            $archive[] = $array;
        }
        return response([
            'status' => 'success',
            'message' => 'Archive Data Get Successfully..',
            'data' => [
                'heading' => $heading,
                'archiveData' => $archive,
            ],
        ], 200);
    }
}