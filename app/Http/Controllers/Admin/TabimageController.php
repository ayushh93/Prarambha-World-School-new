<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tab;
use App\Models\Tabimage;
use Illuminate\Http\Request;
use Image;
use File;

class TabimageController extends Controller
{
    protected $tab = null;
    protected $tabimage = null;
    public function __construct(Tab $tab, Tabimage $tabimage)
    {
        $this->tab = $tab;
        $this->tabimage = $tabimage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabimages = $this->tabimage->getALl();
        return view('admin.tabimage.index',compact('tabimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tabs = Tab::all();
        return view('admin.tabimage.create',compact('tabs'));
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
            $destinationPath    = 'uploads/tabimage/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $tabimage = new Tabimage();
        $tabimage->tab_id = $request->tab_id;
        $tabimage->slug = \Str::slug($request->title);
        $tabimage->title = $request->title;
        $tabimage->image = $name;
        $status = $tabimage->save();
        if($status){
            $request->session()->flash('success','Image was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Image could not be added at this moment.');
        }
        return redirect()->route('tabimage.index');
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
        $tabimage = Tabimage::find($id);
        $tabs = Tab::all();
        return view('admin.tabimage.edit',compact('tabimage','tabs'));
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
        $tabimage = Tabimage::find($id);
        $image1 = $tabimage->image;
        if($request->hasFile('image')) {
            File::delete('uploads/tabimage'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/tabimage/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $tabimage->tab_id = $request->tab_id;
        $tabimage->title = $request->title;
         $tabimage->slug = \Str::slug($request->title);
        $tabimage->image = $name;
        $status = $tabimage->save();
        if($status){
            $request->session()->flash('success','Image was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Image could not be updated at this moment.');
        }
        return redirect()->route('tabimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabimage = Tabimage::find($id);
        $img = $tabimage->image;
        $status = $tabimage->delete();
        if($status){
            \File::delete('uploads/tabimage'.'/'.$img);
            request()->session()->flash('success','Image deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Image could not be deleted at this moment.');
        }
        return redirect()->route('tabimage.index');
    }
}
