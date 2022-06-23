<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use File;
use Image;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id','desc')->get();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            $image              = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name              = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/event/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $event = new Event();
        $event->title = $request->title;
        $event->slug = \Str::slug($request->title);
        $event->event_date = $request->event_date;
        $event->description = $request->description;
        $event->image = $name;
        $status = $event->save();
        if($status){
            $request->session()->flash('success','Event was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Event could not be added at this moment.');
        }
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('admin.event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $image1 = $event->image;
        if($request->hasFile('image')) {
            File::delete('uploads/event'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/event/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $event->title = $request->title;
        $event->slug = \Str::slug($request->title);
        $event->event_date = $request->event_date;
        $event->description = $request->description;
        $event->image = $name;
        $status = $event->save();
        if($status){
            $request->session()->flash('success','Event was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Event could not be updated at this moment.');
        }
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $img = $event->image;
        $status = $event->delete();
        if($status){
            \File::delete('uploads/event'.'/'.$img);
            request()->session()->flash('success','Event deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Event could not be deleted at this moment.');
        }
        return redirect()->route('event.index');
    }
}
