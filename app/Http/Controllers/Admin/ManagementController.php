<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;
use Image;
use File;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements = Management::orderBy('id','desc')->get();
        return view('admin.management.index',compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management.create');
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
            $destinationPath    = 'uploads/management/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $management = new Management();
        $management->title = $request->title;
        $management->position = $request->position;
        $management->image = $name;
        $status = $management->save();
        if($status){
            $request->session()->flash('success','Management was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Management could not be added at this moment.');
        }
        return redirect()->route('management.index');
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
        $management = Management::find($id);
        return view('admin.management.edit',compact('management'));
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
        $management = Management::find($id);
        $image1 = $management->image;
        if($request->hasFile('image')) {
            File::delete('uploads/management'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/management/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $management->title = $request->title;
        $management->position = $request->position;
        $management->image = $name;
        $status = $management->save();
        if($status){
            $request->session()->flash('success','Management Info was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Management Info could not be updated at this moment.');
        }
        return redirect()->route('management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $management = Management::find($id);
        $img = $management->image;
        $status = $management->delete();
        if($status){
            \File::delete('uploads/management'.'/'.$img);
            request()->session()->flash('success','Management Info deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Management Info could not be deleted at this moment.');
        }
        return redirect()->route('management.index');
    }
}
