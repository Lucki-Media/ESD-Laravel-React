<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Headings;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    public function update_heading($type)
    {
        $data = Headings::where('type', $type)->value('heading');
        return view('Heading.edit')->with(['heading' => $data, 'type' => $type]);
    }

    public function heading_update(Request $request)
    {
        // return $request;
        $request->validate([
            'type' => 'required',
            'heading' => 'required',
        ], [
            'type.required' => 'Type is missing. Something went Wrong',
            'heading.required' => 'Heading field is required.',
        ]);

        $data = Headings::where('type', $request->type)->update([
            'heading' => $request->heading
        ]);

        if($request->type == "converge"){
            return redirect(route('admin.converge-index'))->with('success', "Heading has been updated Successfully.");
        } elseif ($request->type == "collaborate") {
            return redirect(route('admin.collaborate_heading'))->with('success', "Heading has been updated Successfully.");
        } elseif ($request->type == "cogitate") {
            return redirect(route('admin.cogitate_heading'))->with('success', "Heading has been updated Successfully.");
        }elseif ($request->type == "communicate"){
            return redirect(route('admin.communicate_heading'))->with('success', "Heading has been updated Successfully.");
        }
    }
}
