<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConvergeTopics;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConvergeTopicController extends Controller
{
    public function add()
    {
        return view('ConvergeTopic.add');
    }

    public function insert(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'snow_picker_content' => 'required',
        ], [
            'title.required' => 'Title field is required.',
            'snow_picker_content.required' => 'Description field is required.',
        ]);

        $data = new ConvergeTopics;
        $data->title = $request->title;
        $data->description = '<p>' . $request->snow_picker_content . '</p>';
        $data->created_at = Carbon::now();
        $data->save();
        return redirect(route('admin.converge-index'))->with('success', "Topic has been added Successfully.");
    }

    public function edit($id)
    {
        // return $id;
        $data = ConvergeTopics::where('topic_id', $id)->first();
        return view('ConvergeTopic.edit')->with(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'snow_picker_content' => 'required',
        ], [
            'title.required' => 'Title field is required.',
            'snow_picker_content.required' => 'Description field is required.',
        ]);

        $data = ConvergeTopics::where('topic_id', $id)->update([
            'title' => $request->title,
            'description' => '<p>' . $request->snow_picker_content . '</p>',
        ]);


        return redirect(route('admin.converge-index'))->with('success', "Topic has been updated Successfully.");
    }

    public function delete($id)
    {
        // return $id;
        $data = ConvergeTopics::where('topic_id', $id)->delete();
        return redirect(route('admin.converge-index'))->with('success', "Topic has been deleted Successfully.");
    }

}