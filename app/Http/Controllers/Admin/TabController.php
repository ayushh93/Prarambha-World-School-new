<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tab;
use Illuminate\Http\Request;

class TabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabs = Tab::all();
        return view('admin.tab.index',compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tab = new Tab();
        $tab->title = $request->title;
        $tab->slug = \Str::slug($request->title);
        $status = $tab->save();
        if($status){
            $request->session()->flash('success','Tab Title was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Tab Title could not be added at this moment.');
        }
        return redirect()->route('tab.index');

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
        $tab = Tab::find($id);
        return view('admin.tab.edit',compact('tab'));
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
        $tab = Tab::find($id);
        $tab->title = $request->title;
        $tab->slug = \Str::slug($request->title);
        $status = $tab->save();
        if($status){
            $request->session()->flash('success','Tab Title was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Tab Title could not be updated at this moment.');
        }
        return redirect()->route('tab.index');
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
