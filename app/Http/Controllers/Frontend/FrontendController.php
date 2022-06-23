<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admission;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Why;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('*')->where('status',1)->get();
        $about = About::select('*')->first();
        $whys = Why::select('*')->get();
        $events = Event::select('*')->latest()->paginate(4);
        $gallery = Gallery::select('*')->latest()->paginate(10);
        $partners = Partner::select('*')->where('status',1)->get();
        $contact = Contact::select('*')->first();
        $admission = Admission::select('*')->first();
        return view('frontend.index',compact('sliders','about','events','gallery','partners','contact','admission','whys'));
    }

}
