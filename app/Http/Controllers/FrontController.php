<?php

namespace App\Http\Controllers;

use App\Models\PublicContact;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        //status 2 = approved
        $contacts = PublicContact::where('status', 2)->get();
        return view('welcome', compact('contacts'));
    }
}
