<?php


namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::orderBy('created_at', 'DESC')->get();
        return view('pages.guests.index', compact('guests'));
    }

    public function show($id)
    {
        $guests = Guest::find($id);
        return view('pages.guests.show', compact('guests'));
    }

    public function destroy($id)
    {
        $guests = Guest::find($id);
        $guests->delete();
        return redirect()->route('admin.guests.index');
    }
}
