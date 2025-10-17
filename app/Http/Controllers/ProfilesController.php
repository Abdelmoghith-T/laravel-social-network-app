<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(10);
        return view('profile.index', compact('profiles'));
    }

    public function show(Request $request)
    {
        $id = (int)$request->id;
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile'));
    }
}
