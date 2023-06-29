<?php

namespace App\Http\Controllers;

use App\Models\Headings;
use Image;
use URL;
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
        $portfolio = Portfolio::all();
        return view('Collaborate.portfolioIndex')->with([
            'portfolio' => $portfolio,
        ]);
    }
    
    public function add_portfolio()
    {
        return view('Collaborate.addPortfolio');
    }

    public function save_portfolio(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'features.*' => 'distinct',
        ], [
            'title.required' => 'Title field is required.',
            // 'features.*.distinct' => 'Every Feature should be unique.',
        ]);
        // echo "<pre>";print_r($request->all()); exit;

        $portfolio_id = Portfolio::insertGetId([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        foreach ($request->features as $value) {
            if ($value != "") {
                PivotFeatures::insert(['portfolio_id' => $portfolio_id, 'feature' => $value, 'created_at' => Carbon::now()]);
            }
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
        $features = PivotFeatures::where('portfolio_id', $id)->pluck('feature')->toArray();
        return view('Collaborate.view')->with([
            'portfolio' => $portfolio,
            'images' => $images,
            'features' => $features,
        ]);
    }

    public function edit_portfolio($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        $images = PivotImages::where('portfolio_id', $id)->pluck('image')->toArray();
        $features = PivotFeatures::where('portfolio_id', $id)->pluck('feature')->toArray();
        return view('Collaborate.editPortfolio')->with([
            'portfolio' => $portfolio,
            'images' => $images,
            'features' => $features,
        ]);
    }

    public function update_portfolio(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 'features.*' => 'distinct',
        ], [
            'title.required' => 'Title field is required.',
            // 'features.*.distinct' => 'Every Feature should be unique.',
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->content = $request->content;
        $portfolio->status = $request->status;
        $portfolio->save();
        // echo "<pre>";print_r($portfolio); exit;

        PivotFeatures::where('portfolio_id', $id)->delete();
        foreach ($request->features as $value) {
            if ($value != "") {
                PivotFeatures::insert(['portfolio_id' => $id, 'feature' => $value, 'created_at' => Carbon::now()]);
            }
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
        return redirect(url('admin/edit_portfolio').'/'.$id)->with('success', "Image has been deleted Successfully.");
    }

    public function delete_portfolio($id)
    {
        Portfolio::where('id', $id)->delete();
        PivotFeatures::where('portfolio_id', $id)->delete();

        $images = PivotImages::where('portfolio_id', $id)->pluck('image')->toArray();
        foreach ($images as $image) {
            $imagePath = public_path('thumbnail/' . $image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            PivotImages::where(['image' => $image])->delete();
        }
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
            if($value['status'] == 'portfolio'){
                $features = PivotFeatures::where('portfolio_id', $value['id'])->pluck('feature')->toArray();
                $imageData = PivotImages::where('portfolio_id', $value['id'])->pluck('image')->toArray();
                $images = [];
                foreach ($imageData as $image) {
                    $images[] = URL::asset('thumbnail/' . $image);
                }
                $array = [
                    'title'     => $value['title'],
                    'content'   => $value['content'],
                    'status'    => $value['status'],
                    'images'    => $images,
                    'features'  => $features,
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
}
