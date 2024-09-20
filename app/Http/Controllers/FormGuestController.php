<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Institution;
use Illuminate\Http\Request;

class FormGuestController extends Controller
{
    public function index()
    {
        $institution = Institution::all();
        return view('pages.form', compact('institution'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:5|max:128',
            'institution_id' => 'required',
            'from' => 'required|min:3|max:255',
            'email' => 'required|email|max:64',
            'phonenumber' => 'required|min:10|max:16',
            'note' => 'required',
        ]); 

        $guest = Guest::create($request->all());
        return redirect()->route('form.index')
        ->with('success', 'Data kamu sudah disimpan.');

    }
}
