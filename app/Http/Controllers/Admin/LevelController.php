<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\School;
use Illuminate\Http\Request;
use Image;
use File;

class LevelController extends Controller
{
    protected $level = null;
    public function __construct(Level $level)
    {
        $this->level = $level;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = $this->level->getAll();
        return view('admin.level.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::orderBy('title','asc')->get();
        return view('admin.level.create',compact('schools'));
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
            $destinationPath    = 'uploads/level/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $level = new Level();
        $level->school_id = $request->school_id;
        $level->title = $request->title;
        $level->slug = \Str::slug($request->title);
        $level->level_date = $request->level_date;
        $level->description = $request->description;
        $level->image = $name;
        $status = $level->save();
        if($status){
            $request->session()->flash('success','Level Data was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Level Data could not be added at this moment.');
        }
        return redirect()->route('level.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::find($id);
        return view('admin.level.show',compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::find($id);
        $schools = School::orderBy('title','asc')->get();
        return view('admin.level.edit',compact('level','schools'));
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
        $level = Level::find($id);
        $image1 = $level->image;
        if($request->hasFile('image')) {
            File::delete('uploads/level'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/level/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $level->school_id = $request->school_id;
        $level->title = $request->title;
        $level->slug = \Str::slug($request->title);
        $level->level_date = $request->level_date;
        $level->description = $request->description;
        $level->image = $name;
        $status = $level->save();
        if($status){
            $request->session()->flash('success','Level Data was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Level Data could not be updated at this moment.');
        }
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        $img = $level->image;
        $status = $level->delete();
        if($status){
            \File::delete('uploads/level'.'/'.$img);
            request()->session()->flash('success','Level Data deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Level Data could not be deleted at this moment.');
        }
        return redirect()->route('level.index');
    }
}
