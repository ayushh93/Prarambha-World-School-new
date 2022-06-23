<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Send;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sends = Send::select('*')->orderBy('id','desc')->get();
        return view('admin.send.index',compact('sends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $send = Send::find($id);
        return view('admin.send.show',compact('send'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $send = Send::find($id);
        $status = $send->delete();
        if($status){
            request()->session()->flash('success','Message deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Message could not be deleted at this moment.');
        }
        return redirect()->route('send.index');
    }

    public function enable($id)
    {
        $send = Send::find($id);
        $send->status = 1;
        $send->save();
        return redirect()->route('send.index')->with('success', 'Mark Read');
    }

    public function disable($id)
    {
        $send = Send::find($id);
        $send->status = 0;
        $send->save();
        return redirect()->route('send.index')->with('success', ' Mark UnRead');
    }
}
