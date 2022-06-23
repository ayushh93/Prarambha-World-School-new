<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policys = Policy::all();
        return view('admin.policy.index',compact('policys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policy = new Policy();
        $policy->title = $request->title;
        $policy->description = $request->description;
        $status = $policy->save();
        if($status){
            $request->session()->flash('success','Policy was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Policy could not be added at this moment.');
        }
        return redirect()->route('policy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $policy = Policy::find($id);
        return view('admin.policy.show',compact('policy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $policy = Policy::find($id);
        return view('admin.policy.edit',compact('policy'));
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
        $policy = Policy::find($id);
        $policy->title = $request->title;
        $policy->description = $request->description;
        $status = $policy->save();
        if($status){
            $request->session()->flash('success','Policy was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Policy could not be updated at this moment.');
        }
        return redirect()->route('policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy = Policy::find($id);
        $status = $policy->delete();
        if($status){
            request()->session()->flash('success','Policy deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Policy could not be deleted at this moment.');
        }
        return redirect()->route('policy.index');
    }
}
