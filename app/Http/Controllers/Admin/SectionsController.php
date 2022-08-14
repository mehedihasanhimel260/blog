<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\pageOption;
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

    public function weboption()
    {
        $weboptions = pageOption::get();
        return view('backend.section.pageoption', compact('weboptions'));
    }
    public function weboptionstore(Request $request)
    {
        $pageOption = pageOption::where('id', 1)->first();




        if (!$pageOption) {

            if ($request->file('about_me_image')) {
                $imagename = time() . '.' . $request->about_me_image->extension();
                $request->about_me_image->move('post/', $imagename);
            }
            $pageOption = pageOption::create([
                'website_title'     => $request->website_title,
                'about_me_short'    => $request->about_me_short,
                'about_me_image'    => $imagename,
                'fb_link'           => $request->fb_link,
                'twitter_link'      => $request->twitter_link,
                'instagram_link'    => $request->instagram_link,
                'linkedin_link'     => $request->linkedin_link,
                'subscribe_blog'     => $request->subscribe_blog,
            ]);
            return redirect()->back()->with('seccess', 'Page Option Created');
        } else {

            if ($request->file('about_me_image')) {
                if ($pageOption->about_me_image && file_exists('post/' . $pageOption->about_me_image)) {
                    unlink('post/' . $pageOption->about_me_image);
                }
                $imagename = time() . '.' . $request->about_me_image->extension();
                $request->about_me_image->move('post/', $imagename);
                $pageOption->about_me_image = $imagename;
            }

            $pageOption->update([
                'website_title'     => $request->website_title,
                'about_me_short'    => $request->about_me_short,
                'about_me_image'    =>  $imagename,
                'fb_link'           => $request->fb_link,
                'twitter_link'      => $request->twitter_link,
                'instagram_link'    => $request->instagram_link,
                'linkedin_link'     => $request->linkedin_link,
                'subscribe_blog'     => $request->subscribe_blog,

            ]);
            return redirect()->back()->with('seccess', 'Page Option Update');
        }
    }
}
