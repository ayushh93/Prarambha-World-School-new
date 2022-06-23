<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Course;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Kindergarten;
use App\Models\Level;
use App\Models\Management;
use App\Models\Policy;
use App\Models\School;
use App\Models\Tab;
use App\Models\Tabimage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $about =  About::select('*')->first();
        return view('frontend.aboutUs',compact('about'));
    }

    public function policy()
    {
        $policy = Policy::select('*')->first();
        return view('frontend.policy',compact('policy'));
    }

    public function management()
    {
        $management = Management::select('*')->get();
        return view('frontend.management',compact('management'));
    }

    public function faculty()
    {
        $faculty = Facility::select('*')->where('slug','faculty')->first();
        return view('frontend.faculty',compact('faculty'));
    }

    public function facilities()
    {
        $facility = Facility::select('*')->where('slug','facility')->first();
        return view('frontend.facility',compact('facility'));
    }

    public function gallery()
    {
        $gallery = Gallery::select('*')->latest()->get();
        return view('frontend.gallery',compact('gallery'));
    }

    public function overviews()
    {
        $over = Facility::select('*')->where('slug','overviews')->first();
        return view('frontend.overviews',compact('over'));
    }
    public function schoolFee()
    {
        $fee = Facility::select('*')->where('slug','school-fees')->first();
        return view('frontend.schoolFee',compact('fee'));
    }

    public function regulations()
    {
        $regulation = Facility::select('*')->where('slug','regulations')->first();
        return view('frontend.regulations',compact('regulation'));
    }

    public function course($slug)
    {
        $course = Course::select('*')->where('slug',$slug)->first();
        return view('frontend.course',compact('course'));
    }

    public function school($slug)
    {
        $school = School::select('*')->where('slug',$slug)->first();
        $levels = Level::select('*')->where('school_id',$school->id)->latest()->get();
        return view('frontend.school',compact('school','levels'));
    }

    public function calendar()
    {
        return view('frontend.calendar');
    }

    public function allEvent()
    {
        $levels = Level::select('*')->latest()->paginate(16);
        return view('frontend.allEvent',compact('levels'));
    }
    
    public function singleEvent($slug)
    {
        $event = Level::select('*')->where('slug',$slug)->first();
        $Recentevents = Level::select('*')->where('id','!=',$event->id)->latest()->paginate(8);
        return view('frontend.singleevent',compact('event','Recentevents'));
    }

    public function kinder()
    {
        $kinder = Kindergarten::select('*')->first();
        $tabs = Tab::select('*')->get();
        $tabimages = array();
        foreach($tabs as $tabimg){
            $item = Tabimage::select('*')->where('tab_id',$tabimg->id)->get();
            //dd($item);
            foreach($item as $i){
                array_push($tabimages, $i);
            }
        }
        return view('frontend.kinder',compact('kinder','tabs','tabimages'));
    }
    
    public function faq()
    {
        $faqs = Faq::select('*')->get();
        return view('frontend.faq',compact('faqs'));
    }


}
