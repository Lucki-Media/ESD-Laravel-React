<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConvergeLinks;
use App\Models\ConvergeTopics;
use App\Models\Headings;
use Illuminate\Http\Request;

class ConvergeController extends Controller
{
    public function index()
    {
        $topic_data = ConvergeTopics::all()->toArray();
        $link_data = ConvergeLinks::all()->toArray();
        return view('Converge.index')->with([
            'topic_data' => $topic_data,
            'link_data' => $link_data
        ]);
    }

    public function convergeData()
    {
        $heading = Headings::where('type', 'converge')->value('heading');
        $topic_data = ConvergeTopics::all()->toArray();
        $link_data = ConvergeLinks::all()->toArray();

        return response([
            'status' => 'success',
            'message' => 'Converge Data Get Successfully..',
            'data' => [
                'heading' => $heading,
                'topic_data' => $topic_data,
                'link_data' => $link_data,
            ],
        ], 200);
    }
}
