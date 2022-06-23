<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Contact;
use App\Models\Onlineform;
use App\Models\Send;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class FormController extends Controller
{
    public function contactUs()
    {
        $contact = Contact::select('*')->first();
        return view('frontend.contactUs',compact('contact'));
    }

    public function send(Request $request)
    {
        $send = new Send();
        $send->title = $request->title;
        $send->email = $request->email;
        $send->subject = $request->subject;
        $send->description = $request->description;
        $status = $send->save();
        if($status){
            $request->session()->flash('success','Your Message was successfully send.');
        }else{
            $request->session()->flash('error','Sorry! Your Message could not be send at this moment.');
        }
        return redirect()->back();

    }

    public function admission()
    {
        $admission = Admission::select('*')->first();
        return view('frontend.admission',compact('admission'));
    }

    public function studentForm(Request $request)
    {
        /* image upload */
        if ($request->hasFile('inputGroupFile01')) {
            $image = $request->file('inputGroupFile01');
            $ImageUpload = Image::make($image)->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'uploads/form/';
            $ImageUpload->save($destinationPath . $name);
        } else {
            $name = '';
        }
//dd($name);

        /* PDF upload */
        if($request->hasFile('upload')){
            $file = $request->file('upload');
            $destinationPath = 'uploads/pdf/';
            $files = $file->getClientOriginalName();
            $fileName = $files;
            $file->move($destinationPath, $fileName);
        }
        else
        {
            $files= '';
        }

        $form = new Onlineform();
        $form->name = $request->name;
        $form->dob = $request->dob;
        $form->pob = $request->pob;
        $form->gender = $request->gender;
        $form->nationality = $request->nationality;
        $form->mothertongue = $request->mothertongue;
        $form->religion = $request->religion;
        $form->appliedgrade = $request->appliedgrade;
        $form->academicyear = $request->academicyear;
        $form->stdntprmntaddress = $request->stdntprmntaddress;
        $form->stdntcurrentaddress = $request->stdntcurrentaddress;
        $form->lastinfo = $request->lastinfo;
        $form->activity = $request->activity;
        $form->bloodgroup = $request->bloodgroup;
        $form->height = $request->height;
        $form->weight = $request->weight;
        $form->medicalissue = $request->medicalissue;
        $form->hostel = $request->hostel;
        $form->transportation = $request->transportation;
        $form->pickup_point = $request->pickup_point;
        $form->lunch = $request->lunch;
        $form->veg_nonveg = $request->veg_nonveg;
        $form->afterschool = $request->afterschool;
        $form->after_school_program = $request->after_school_program;
        $form->fathername = $request->fathername;
        $form->fathercontact = $request->fathercontact;
        $form->mothername = $request->mothername;
        $form->mothercontact = $request->mothercontact;
        $form->guardianname = $request->guardianname;
        $form->guardiancontact = $request->guardiancontact;
        $form->sibling = $request->sibling;
        $form->hear = $request->hear;
        $form->delarationInput = $request->delarationInput;
        $form->declareRole = $request->declareRole;
        $form->declaration2 = $request->declaration2;
        $form->applicantscontact = $request->applicantscontact;
        $form->applicantsemail = $request->applicantsemail;
        $form->inputGroupFile01 = $name;
        $form->upload = $files;
        if((!empty($request->declaration2)) && ($form->save())){
            Session::flash('success','Your form has been send successfully.');
            return redirect()->back();
        }else{
            Session::flash('error','Sorry! Your form cannot be send at this moment due to insufficient validation.');
            return redirect()->back();
        }
    }
}
