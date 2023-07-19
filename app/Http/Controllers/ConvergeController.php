<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ConvergeLinks;
use App\Models\ConvergeTopics;
use App\Models\Headings;
use App\Models\PivotImages;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceLinks;
use DB;
use Illuminate\Http\Request;
use URL;
use Illuminate\Support\Collection;

class ConvergeController extends Controller
{
    public function index()
    {
        $topic_data = ConvergeTopics::all()->toArray();
        return view('Converge.index')->with([
            'topic_data' => $topic_data,
            // 'link_data' => $link_data
        ]);
    }

    public function convergeData()
    {
        $heading = Headings::where('type', 'converge')->value('heading');
        $data = Content::where(['page' => 'converge', 'deleted_status' => '1'])->get()->toArray();
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

        // return $transformedArray;
        return response([
            'status' => 'success',
            'message' => 'Converge Data Get Successfully..',
            'data' => [
                'heading' => $heading == null ? "" : $heading,
                'details' => $details ? $details : [],
            ],
        ], 200);
    }
}