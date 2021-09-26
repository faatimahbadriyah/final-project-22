<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;
use Auth;

class ProfileController extends Controller
{   
    // THIS FUNCTION TO PROHIBIT BYPASS OF CERTAIN PAGES, MIDDLEWARE
    public function __construct() {
        $this->middleware('auth')->except(['index']); //except||only
    }
    
    public function create() {
        return view ('profiles.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'fullname' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
                
        ]);

        $profile = Profile::create([
            "fullname" => $request["fullname"],
            "gender" => $request["gender"],
            "address" => $request["address"],
            "phone" => $request["phone"],
            "photo" => $request["photo"],
            "user_id" => Auth::id()
        ]);
        return redirect('profiles')->with('success', 'Profil berhasil disimpan.');
    }

    public function index() {
        $user = Auth::user();
        $profiles = Profile::all(); 
        return view ('profiles.index', compact('profiles'));
    }

    public function show($id) {
        $profiles = Profile::find($id);
        return view('profiles.show', compact('profiles'));
    }

    public function edit($id) {
        $profiles = Profile::find($id);
        return view('profiles.edit', compact('profiles'));
    }

    public function update($id, Request $request) {
        $update = Profile::where ('id', $id)->update([
            "fullname" => $request["fullname"],
            "gender" => $request["gender"],
            "address" => $request["address"],
            "phone" => $request["phone"],
            "photo" => $request["photo"]
        ]);
        return redirect('/profiles')->with('success', 'Profile berhasil disimpan!');
    }

    public function destroy($id) {
        // $query = DB::table('profile')->where('id', $id)->delete();
        Profile::destroy($id);
        return redirect('/profiles')->with('success', "Profile telah dihapus.");
    }
}
