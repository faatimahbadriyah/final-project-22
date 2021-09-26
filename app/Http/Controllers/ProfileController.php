<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'photo' => 'required|image|max:2000', // max 2MB
        ]);

        $file = $request->file('photo');
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filenameSimpan = $filename . '_' . time() . '.' . $extension;

        $saveFile = $file->storeAs('public/profiles', $filenameSimpan);
        if ($saveFile) {
            $profile = Profile::create([
                "fullname" => $request["fullname"],
                "gender" => $request["gender"],
                "address" => $request["address"],
                "phone" => $request["phone"],
                "photo" => $filenameSimpan,
                "user_id" => Auth::id(),
            ]);
        }

        return redirect('profiles')->with('success', 'Profil berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function show($id)
    {
        $profiles = Profile::find($id);
        return view('profiles.show', compact('profiles'));
    }

    public function edit($id)
    {
        $profiles = Profile::find($id);
        return view('profiles.edit', compact('profiles'));
    }

    public function update($id, Request $request)
    {
        $profile = Profile::where('id', $id)->first();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $saveFile = $file->storeAs('public/profiles', $filenameSimpan);
            $profile->photo = $filenameSimpan;
        }

        $profile->fullname = $request["fullname"];
        $profile->gender = $request["gender"];
        $profile->address = $request["address"];
        $profile->phone = $request["phone"];
        $profile->update();

        return redirect('/profiles')->with('success', 'Profile berhasil disimpan!');
    }

    public function destroy($id)
    {
        Profile::destroy($id);
        return redirect('/profiles')->with('success', "Profile telah dihapus.");
    }
}