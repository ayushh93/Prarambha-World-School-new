<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Image;
use File;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('admin.message.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.message.create');
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
            $destinationPath    = 'uploads/messagefrom/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = '';
        }
        $message = new Message();
        $message->title = $request->title;
        $message->slug = \Str::slug($request->title);
        $message->description = $request->description;
        $message->image = $name;
        $status = $message->save();
        if($status){
            $request->session()->flash('success','Message was successfully added.');
        }else{
            $request->session()->flash('error','Sorry! Message could not be added at this moment.');
        }
        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        return view('admin.message.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        return view('admin.message.edit',compact('message'));
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
        $message = Message::find($id);
        $image1 = $message->image;
        if($request->hasFile('image')) {
            File::delete('uploads/messagefrom'.'/'.$image1);
            $image             = $request->file('image');
            $ImageUpload        = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name               = time().'.' . $image->getClientOriginalExtension();
            $destinationPath    = 'uploads/messagefrom/';
            $ImageUpload->save($destinationPath.$name);
        }else{
            $name = $image1;
        }
        $message->title = $request->title;
        $message->slug = \Str::slug($request->title);
        $message->description = $request->description;
        $message->image = $name;
        $status = $message->save();
        if($status){
            $request->session()->flash('success','Message was successfully updated.');
        }else{
            $request->session()->flash('error','Sorry! Message could not be updated at this moment.');
        }
        return redirect()->route('message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $img = $message->image;
        $status = $message->delete();
        if($status){
            \File::delete('uploads/messagefrom'.'/'.$img);
            request()->session()->flash('success','Message deleted successfully');
        }else{
            request()->session()->flash('error','Sorry! Message could not be deleted at this moment.');
        }
        return redirect()->route('message.index');
    }

    public function enable($id)
    {
        $message = Message::find($id);
        $message->status = 1;
        $message->save();
        return redirect()->route('message.index')->with('success', 'Message  Enabled Successfully');
    }

    public function disable($id)
    {
        $message = Message::find($id);
        $message->status = 0;
        $message->save();
        return redirect()->route('message.index')->with('success', 'Message  Disabled Successfully');
    }
}
