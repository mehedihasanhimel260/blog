<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function create()
    {
        $categories = category::orderBy('id', 'DESC')->get();
        return view('backend.section.add', compact('categories'));
    }
    public function store(Request $request)
    {

        $section = Section::where('id', 1)->first();
        if (!$section) {
            $section = Section::create([
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
            ]);
            return redirect()->back()->with('seccess', 'Section Created');
        } else {
            $section->update([
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
            ]);
            return redirect()->back()->with('seccess', 'Section Update');
        }
    }
}
