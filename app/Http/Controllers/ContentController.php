<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ConvergeTopics;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($page)
    {
        $data = Content::where(['page' => $page, 'deleted_status' => '1'])->get()->toArray();
        // return $data;
        return view('Content.index')->with([
            'data' => $data,
            'page' => $page
        ]);
    }

    public function heading($page)
    {
        return view('Content.heading')->with([
            'page' => $page,
        ]);
    }

    public function add_content($page)
    {
        // $topic_data = ConvergeTopics::all()->toArray();
        return view('Content.add')->with([
            'page' => $page,
        ]);
    }

    public function set_content(Request $request)
    {
        // return $request;
        $request->validate([
            'page' => 'required',
            'type' => 'required',
        ]);

        $data = new Content;
        $data->page = $request->page;
        $data->type = $request->type;
        $data->title = $request->title;
        $data->module = $request->type == 'module' ? $request->module : "";
        $data->description = $request->type == 'content' ? $request->snow_picker_content : "";
        $data->deleted_status = '1';
        $data->created_at = Carbon::now();
        $data->save();

        return redirect('admin/content/' . $request->page)->with('success', "Content has been added Successfully.");
    }

    public function edit_content($page, $id)
    {
        $data = Content::where('id', $id)->first();
        return view('Content.edit')->with([
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function update_content(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'page' => 'required',
            'type' => 'required',
        ]);

        $data = Content::where('id', $id)->first();
        $data->page = $request->page;
        $data->type = $request->type;
        $data->title = $request->title;
        $data->module = $request->type == 'module' ? $request->module : "";
        $data->description = $request->type == 'content' ? $request->snow_picker_content : "";
        $data->deleted_status = '1';
        $data->save();

        return redirect('admin/content/' . $request->page)->with('success', "Content has been updated Successfully.");
    }

    public function delete_content($page, $id)
    {
        $data = Content::where('id', $id)->update(['deleted_status' => '0']);
        return redirect('admin/content/' . $page)->with('success', "Content has been deleted Successfully.");
    }

}