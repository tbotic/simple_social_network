<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move('images', $imageName);

        // s obzirom da se automatski ubacuje u bazu podataka created_at vrijednost koja ce nam sluziti kasnije da
        // poredamo slike iz baze podataka i da uzmemo samo one psotane u zadnja 24 sata, nema potrebe da radimo
        // posebno nase polje u kojem cemo uzimati trenutno vrijeme i spremati skupa s ovim u bazu

        $request->user()->posts()->create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('feed')->with('flash', 'Your image is successfuly uploaded');
    }

}
