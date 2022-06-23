<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Image;
use File;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        return view('admin.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new Link();
        $link->title = $request->title;
        $link->link = $request->link;
        $link->icon = $request->icon;
        $status = $link->save();
        if($status){
            $request->session()->flash('success','Social Link was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Social Link could not be added at this moment.');
        }
        return redirect()->route('link.index');
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
        $link = Link::find($id);
        return view('admin.link.edit',compact('link'));
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
        $link = Link::find($id);

        $link->title = $request->title;
        $link->link = $request->link;
        $link->icon = $request->icon;
        $status = $link->save();
        if($status){
            $request->session()->flash('success','Social Link was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Social Link could not be updated at this moment.');
        }
        return redirect()->route('link.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);
        $status = $link->delete();
        if($status){
            request()->session()->flash('success','Social Link deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Social Link could not be deleted at this moment.');
        }
        return redirect()->route('link.index');
    }

    public function enable($id)
    {
        $link = Link::find($id);
        $link->status = 1;
        $link->save();
        return redirect()->route('link.index')->with('success', 'Social link  Enabled Successfully');
    }

    public function disable($id)
    {
        $link = Link::find($id);
        $link->status = 0;
        $link->save();
        return redirect()->route('link.index')->with('success', 'Social link  Disabled Successfully');
    }
}
