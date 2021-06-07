<?php

namespace App\Http\Controllers;

use App\Models\PublicContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicContactController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contacts = PublicContact::where('user_id' , Auth::id())->get();
        return view('publicContact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicContact.create');
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
            'name' => 'required',
            'phone' => 'required',
        ]);
        $publicContact = new PublicContact();
        $publicContact->name = $request->name;
        $publicContact->phone = $request->phone;
        $publicContact->user_id = Auth::id();
        $publicContact->save();
        return Redirect()->route('publicContact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicContact  $publicContact
     * @return \Illuminate\Http\Response
     */
    public function show(PublicContact $publicContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PublicContact  $publicContact
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicContact $publicContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PublicContact  $publicContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicContact $publicContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicContact  $publicContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicContact $contact)
    {
        $contact->delete();
        return Redirect()->route('publicContact.index');

    }
}
