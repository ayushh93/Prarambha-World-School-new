<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Image;
use File;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilitys = Facility::all();
        return view('admin.facility.index',compact('facilitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
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
            $destinationPath    = 'uploads/facility/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $facility = new Facility();
        $facility->title = $request->title;
        $facility->slug = \Str::slug($request->title);
        $facility->description = $request->description;
        $facility->image = $name;
        $status = $facility->save();
        if($status){
            $request->session()->flash('success','Facility was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Facility could not be added at this moment.');
        }
        return redirect()->route('facility.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = Facility::find($id);
        return view('admin.facility.show',compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);
        return view('admin.facility.edit',compact('facility'));
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
        $facility = Facility::find($id);
        $image1 = $facility->image;
        if($request->hasFile('image')) {
            File::delete('uploads/facility'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/facility/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }

        $facility->description = $request->description;
        $facility->image = $name;
        $status = $facility->save();
        if($status){
            $request->session()->flash('success','Facility was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Facility could not be updated at this moment.');
        }
        return redirect()->route('facility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::find($id);

    }
}
