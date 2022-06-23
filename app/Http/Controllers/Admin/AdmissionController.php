<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;
use Image;
use File;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admission::all();
        return view('admin.admission.index',compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admission.create');
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
            $destinationPath    = 'uploads/admission/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $destinationPath = 'uploads/admission/';
            $files = $file->getClientOriginalName();
            $fileName = $files;
            $file->move($destinationPath, $fileName);
        }
        else
        {
            $files= '';
        }
        $admission = new Admission();
        $admission->title = $request->title;
        $admission->description = $request->description;
        $admission->image = $name;
        $admission->pdf = $files;
        $status = $admission->save();
        if($status){
            $request->session()->flash('success','Admission Detail was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Admission Detail could not be added at this moment.');
        }
        return redirect()->route('admission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admission = Admission::find($id);
        return view('admin.admission.show',compact('admission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admission = Admission::find($id);
        return view('admin.admission.edit',compact('admission'));
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
        $admission = Admission::find($id);
        $image1 = $admission->image;
        if($request->hasFile('image')) {
            File::delete('uploads/admission'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/admission/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $pdf = $admission->pdf;
        if($request->hasFile('pdf')){
            \File::delete('uploads/admission'.'/'.$pdf);
            $file = $request->file('pdf');
            $destinationPath = 'uploads/admission/';
            $files = $file->getClientOriginalName();
            $fileName = $files;
            $file->move($destinationPath, $fileName);
        }
        else
        {
            $files= $pdf;
        }
        $admission->description = $request->description;
        $admission->image = $name;
        $admission->pdf = $files;
        $status = $admission->save();
        if($status){
            $request->session()->flash('success','Admission Detail was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Admission Detail could not be updated at this moment.');
        }
        return redirect()->route('admission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
