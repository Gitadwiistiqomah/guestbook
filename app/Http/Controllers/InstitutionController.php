<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institution = Institution::all();
        return view('pages.institution.index', compact('institution'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.institution.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
        ], [
            'name.required' => 'Name harus diisi.',
            
        ]);

       $institution = Institution::create($request->all());
       return redirect()->route('admin.institution.index'); 
       // return "Proses simpan";
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $institution = Institution::find($id); //SELECT * FROM siswa Where id = $id
        return view('pages.institution.show', compact ('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $institution = Institution::find($id);
        return view('pages.institution.edit', compact ('institution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:128',
        ], [
            'name.required' => 'Name harus diisi.',
            
        ]);

        $institution = Institution::find($id);
        $institution->update($request->all());
        return redirect()->route('admin.institution.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institution = Institution::find($id);
        $institution->delete();
        return redirect()->route('admin.institution.index');
    }
}
