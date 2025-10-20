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

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $bio = $request->bio;
        $password = $request->password;

        Profile::create([
            'name'=>$name,
            'email'=>$email,
            'bio'=>$bio,
            'password'=>$password
        ]);

        //a short syntax but with less control :
        //Profile::create($request->post())

        return redirect()->route("profiles.index");
    }
}
