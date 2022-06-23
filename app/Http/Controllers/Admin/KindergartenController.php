<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kindergarten;
use Illuminate\Http\Request;
use Image;
use File;

class KindergartenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinders = Kindergarten::all();
        return view('admin.kinder.index',compact('kinders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kinder.create');
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
            $destinationPath    = 'uploads/kinder/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $kindergarten = new Kindergarten();
        $kindergarten->title = $request->title;
        $kindergarten->slug = \Str::slug($request->title);
        $kindergarten->description = $request->description;
        $kindergarten->image = $name;
        $status = $kindergarten->save();
        if($status){
            $request->session()->flash('success','Kindergarten Data was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Kindergarten Data could not be added at this moment.');
        }
        return redirect()->route('kindergarten.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kinder = Kindergarten::find($id);
        return view('admin.kinder.show',compact('kinder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kinder = Kindergarten::find($id);
        return view('admin.kinder.edit',compact('kinder'));
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
        $kinder = Kindergarten::find($id);
        $image1 = $kinder->image;
        if($request->hasFile('image')) {
            File::delete('uploads/kinder'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/kinder/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $kinder->title = $request->title;
        $kinder->slug = \Str::slug($request->title);
        $kinder->description = $request->description;
        $kinder->image = $name;
        $status = $kinder->save();
        if($status){
            $request->session()->flash('success','Kindergarten Data was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Kindergarten Data could not be updated at this moment.');
        }
        return redirect()->route('kindergarten.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kinder = Kindergarten::find($id);
        $img = $kinder->image;
        $status = $kinder->delete();
        if($status){
            \File::delete('uploads/kinder'.'/'.$img);
            request()->session()->flash('success','Kindergarten Data deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Kindergarten Data could not be deleted at this moment.');
        }
        return redirect()->route('kindergarten.index');
    }
}
