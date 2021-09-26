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

        // $query = DB::table('profiles')->insert([
        //     "title" => $request["title"],
        //     "body" => $request["body"]
        // ]);

        // MODEL
        // $profile = new Profile;
        // $profile->title = $request["title"];
        // $profile->body = $request["body"];
        // $profile->save(); //in SQL, save(); acts like INSERT

        // USING MASS ASSIGNMENT
        $profile = Profile::create([
            "fullname" => $request["fullname"],
            "gender" => $request["gender"],
            "address" => $request["address"],
            "phone" => $request["phone"],
            "photo" => $request["photo"],
            "user_id" => Auth::id()
        ]);

        // ALTERNATIVE WAY TO SAVE
        // $profile = Profile::create([
        //     "title" => $request["title"],
        //     "body" => $request["body"]
        // ]);

        // $user = Auth::user();
        // $user->profile()->save($profile);

        return redirect('/profiles')->with('success', 'Profil berhasil disimpan.');

    }

    public function index() {
        // $profile = DB::table('profile')->get(); //select * from profile
        // dd($profile);
        $user = Auth::user();
        // $profiles = $user->profiles;
        $profiles = Profile::all(); // USING MASS ASSIGNMENT
        // apabila di DD, akan muncul banyak property selain yg kita perlukan
        return view ('profiles.index', compact('profiles'));
    }

    public function show($id) {
        // $profile = DB::table('profile') -> where('id', $id)->first();
        $profiles = Profile::find($id);
        return view('profiles.show', compact('profiles'));
    }

    public function edit($id) {
        // $profile = DB::table('profile') -> where('id', $id)->first();
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
