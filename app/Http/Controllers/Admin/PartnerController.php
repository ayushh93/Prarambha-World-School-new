<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use File;
use Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('id','desc')->get();
        return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $partner = new Partner();
        $partner->title = $request->title;
        $partner->image = $name;
        $status = $partner->save();
        if($status){
            $request->session()->flash('success','Partner was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Partner could not be added at this moment.');
        }
        return redirect()->route('partner.index');
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
        $partner = Partner::find($id);
        return view('admin.partner.edit',compact('partner'));
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
        $partner = Partner::find($id);
        $image1 = $partner->image;
        if($request->hasFile('image')) {
            File::delete('uploads/partner'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/partner/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $partner->title = $request->title;
        $partner->image = $name;
        $status = $partner->save();
        if($status){
            $request->session()->flash('success','Partner was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Partner could not be updated at this moment.');
        }
        return redirect()->route('partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $img = $partner->image;
        $status = $partner->delete();
        if($status){
            \File::delete('uploads/partner'.'/'.$img);
            request()->session()->flash('success','Partner deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Partner could not be deleted at this moment.');
        }
        return redirect()->route('partner.index');
    }

    public function enable($id)
    {
        $partner = Partner::find($id);
        $partner->status = 1;
        $partner->save();
        return redirect()->route('partner.index')->with('success', 'Partner  Enabled Successfully');
    }

    public function disable($id)
    {
        $partner = Partner::find($id);
        $partner->status = 0;
        $partner->save();
        return redirect()->route('partner.index')->with('success', 'Partner  Disabled Successfully');
    }
}
