<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::select('*')->get();
        return view('admin.school.index',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School();
        $school->title = $request->title;
        $school->slug = \Str::slug($request->title);
        $status = $school->save();
        if($status){
            $request->session()->flash('success','School Category was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! School Category could not be added at this moment.');
        }
        return redirect()->route('school.index');
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
        $school = School::find($id);
        return view('admin.school.edit',compact('school'));
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
        $school = School::find($id);
        $school->title = $request->title;
        $school->slug = \Str::slug($request->title);
        $status = $school->save();
        if($status){
            $request->session()->flash('success','School Category was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! School Category could not be updated at this moment.');
        }
        return redirect()->route('school.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        $status = $school->delete();
        if($status){
            request()->session()->flash('success','School Category deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! School Category could not be deleted at this moment.');
        }
        return redirect()->route('school.index');
    }
}
