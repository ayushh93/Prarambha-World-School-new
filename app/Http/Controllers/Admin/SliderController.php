<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->image = $name;
        $status = $slider->save();
        if($status){
            $request->session()->flash('success','Slider was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Slider could not be added at this moment.');
        }
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);
        $image1 = $slider->image;
        if($request->hasFile('image')) {
            File::delete('uploads/slider'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/slider/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->image = $name;
        $status = $slider->save();
        if($status){
            $request->session()->flash('success','SLider was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! SLider could not be updated at this moment.');
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $img = $slider->image;
        $status = $slider->delete();
        if($status){
            \File::delete('uploads/slider'.'/'.$img);
            request()->session()->flash('success','Slider deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Slider could not be deleted at this moment.');
        }
        return redirect()->route('slider.index');
    }

    public function enable($id)
    {
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider  Enabled Successfully');
    }

    public function disable($id)
    {
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider  Disabled Successfully');
    }
}
