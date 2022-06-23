<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Image;
use File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = Logo::all();
        return view('admin.logo.index',compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
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
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $logo = new Logo();
        $logo->title = $request->title;
        $logo->image = $name;
        $status = $logo->save();
        if($status){
            $request->session()->flash('success','Logo was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Logo could not be added at this moment.');
        }
        return redirect()->route('logo.index');
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
        $logo = Logo::find($id);
        return view('admin.logo.edit',compact('logo'));
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
        $logo = Logo::find($id);
        $image1 = $logo->image;
        if($request->hasFile('image')) {
            File::delete('uploads/logo'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/logo/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $logo->title = $request->title;
        $logo->image = $name;
        $status = $logo->save();
        if($status){
            $request->session()->flash('success','Logo was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Logo could not be updated at this moment.');
        }
        return redirect()->route('logo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Logo::find($id);
        $img = $logo->image;
        $status = $logo->delete();
        if($status){
            \File::delete('uploads/logo'.'/'.$img);
            request()->session()->flash('success','Logo deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Logo could not be deleted at this moment.');
        }
        return redirect()->route('logo.index');
    }
}
