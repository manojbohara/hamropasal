<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'contact_slog'=>'required|max:191',
            'address'=>'max:191',
            'phone'=>'max:191',
            'mobile'=>'max:191',
            'primary_email'=>'max:191',
            'sec_email'=>'max:191',
            'latitude'=>'max:191',
            'longitude'=>'max:191'

        ]);
        $data = [
            'contact_slog'=>$request->contact_slog,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'mobile'=>$request->mobile,
            'primary_email'=>$request->primary_email,
            'sec_email'=>$request->sec_email,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ];

        Contact::firstOrCreate($data);
        return redirect()->route('contacts.index')->with('toast_success', 'Contact Created Successfully!');
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
        $contact = Contact::first();
        return view('backend.contacts.edit',compact('contact'));
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
        $contact = Contact::findOrFail($id);
        $this->validate($request,[
            'contact_slog'=>'required|max:191',
            'address'=>'max:191',
            'phone'=>'max:191',
            'mobile'=>'max:191',
            'primary_email'=>'max:191',
            'sec_email'=>'max:191',
            'latitude'=>'max:191',
            'longitude'=>'max:191'

        ]);
        $data = [
            'contact_slog'=>$request->contact_slog,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'mobile'=>$request->mobile,
            'primary_email'=>$request->primary_email,
            'sec_email'=>$request->sec_email,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ];
        $contact->update($data);
        return redirect()->route('contacts.index')->with('toast_success', 'Contact Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('contacts.index')
        ->with('toast_error', 'Contact Deleted Successfully!');
    }
}
