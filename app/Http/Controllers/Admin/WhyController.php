<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;
use Image;
use File;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whys = Why::all();
        return view('admin.why.index',compact('whys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why.create');
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
            $destinationPath    = 'uploads/why/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $why = new Why();
        $why->title = $request->title;
        $why->image = $name;
        $status = $why->save();
        if($status){
            $request->session()->flash('success','Why Prarambha was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Why Prarambha could not be added at this moment.');
        }
        return redirect()->route('why.index');
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
        $why = Why::find($id);
        return view('admin.why.edit',compact('why'));
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
        $why = Why::find($id);
        $image1 = $why->image;
        if($request->hasFile('image')) {
            File::delete('uploads/why'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/why/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $why->title = $request->title;
        $why->image = $name;
        $status = $why->save();
        if($status){
            $request->session()->flash('success','Why Prarambha was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Why Prarambha could not be updated at this moment.');
        }
        return redirect()->route('why.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $why = Why::find($id);
    }
}
