<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConvergeLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConvergeLinkController extends Controller
{
    public function add()
    {
        return view('ConvergeLink.add');
    }

    public function insert(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
        ], [
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
        ]);

        $data = new ConvergeLinks;
        $data->title = $request->title;
        $data->link = $request->link;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect(route('admin.converge-index'))->with('success', "Link has been added Successfully.");
    }

    public function edit($id)
    {
        // return $id;
        $data = ConvergeLinks::where('link_id', $id)->first();
        return view('ConvergeLink.edit')->with(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
        ], [
            'title.required' => 'Title field is required.',
            'link.required' => 'Link field is required.',
            'link.url' => 'Link field must be a valid URL.',
        ]);

        $data = ConvergeLinks::where('link_id', $id)->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);


        return redirect(route('admin.converge-index'))->with('success', "Link has been updated Successfully.");
    }

    public function delete($id)
    {
        // return $id;
        $data = ConvergeLinks::where('link_id', $id)->delete();
        return redirect(route('admin.converge-index'))->with('success', "Link has been deleted Successfully.");
    }

}
