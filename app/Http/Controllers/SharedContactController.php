<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\SharedContact;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class SharedContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sharedWithMe()
    {
        $contacts = DB::table('shared_contacts')
            ->join('contacts', 'contacts.id', '=' ,'shared_contacts.contact_id')
            ->join('users', 'users.id', '=' ,'shared_contacts.giver_id')
            ->select('contacts.*',  'shared_contacts.*', 'users.name as giver_name'  )
            ->where('receiver_id', Auth::id())->get() ;
        return view('sharedContact.sharedWithMe' , compact('contacts'));
    }

    public function iAmSharing()
    {
        $contacts = DB::table('shared_contacts')
            ->join('contacts', 'contacts.id', '=' ,'shared_contacts.contact_id')
            ->join('users', 'users.id', '=' ,'shared_contacts.receiver_id')
            ->select('contacts.*',  'shared_contacts.*', 'users.name as receiver_name'  )
            ->where('giver_id', Auth::id())->get() ;
        return view('sharedContact.iAmSharing' , compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $contacts = Contact::where('user_id', $id)->get();
        return view('sharedContact.create' , compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sharing_with_id' => 'required',
            'contact' => 'required',
        ]);

        if (User::where('id', '=', $request->sharing_with_id)->count() > 0) {
            $contact = new SharedContact();
            $contact->contact_id = $request->contact;
            $contact->receiver_id = $request->sharing_with_id;
            $contact->giver_id = Auth::id();
            $contact->save();
            return Redirect()->route('contact.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function show(SharedContact $sharedContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedContact $sharedContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SharedContact $sharedContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedContact  $sharedContact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact)
    {
        $sharedContact= SharedContact::where('id', $contact)->first();
        $sharedContact->delete();
        return Redirect()->back();
    }



}
