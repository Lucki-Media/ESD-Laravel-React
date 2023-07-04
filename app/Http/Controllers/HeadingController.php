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

        if ($request->type == "communicate" || $request->type == "cache") {
            return redirect('admin/heading/' . $request->type)->with('success', "Heading has been updated Successfully.");
        } else {
            return redirect('admin/content/' . $request->type)->with('success', "Heading has been updated Successfully.");
        }
    }
}