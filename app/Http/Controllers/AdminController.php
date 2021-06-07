<?php

namespace App\Http\Controllers;

use App\Models\PublicContact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('home');
    }

    public  function approve() {
        $contacts = PublicContact::where('status', 1)->get();
        return view('admin.approve', compact('contacts'));

    }
    public  function approved() {
        $contacts = PublicContact::where('status', 2)->get();
        return view('admin.approved', compact('contacts'));
    }
    public function changeStatus(PublicContact $contact) {
        ($contact->status == 1) ? $contact->status = 2 : $contact->status = 1;
        $contact->save();
        return Redirect()->back();

    }

}
