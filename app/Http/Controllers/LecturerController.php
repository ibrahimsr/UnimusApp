<?php

namespace App\Http\Controllers;
use AuthenticatesUsers;

use App\Models\Lecturer;
use App\User;
use Auth;

use App\Http\Requests\LecturerRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;



class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Lecturer::all();
        $items = Lecturer::all();
        return view('pages.Lecturers.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // inser ke tabel users
         $user = new User;
         $user->role = "dosen";
         $user->name = $request->nama;
         $user->email = $request->email;
         $user->password = bcrypt('admin123');
         $user->remember_token = Str::random(60);
         $user->save();

        // insert ke tabel dosen
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        $dosen = Lecturer::create($data);

        return redirect()->route('lecturers.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Lecturer::findOrFail($id);
        return view('pages.lecturers.edit')->with([
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->all();
        $items = Lecturer::findOrFail($id);
        $items->update($data);

        // kondisi upload foto
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $items->avatar = $request->file('avatar')->getClientOriginalName();
            $items->save();
        }

        return redirect()->route('lecturers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Lecturer::findOrfail($id);
        $item->delete();

        return redirect()->route('lecturers.index');
    }

    public function profile($id)
    {
        $items = Lecturer::findOrFail($id);
        return view('pages.lecturers.profile')->with([
            'items' => $items
        ]);
    }

    public function profilSaya()
    {
        $items = Auth()->user()->lecturers;
        return view('pages.lecturers.profilsaya',compact(['items']));
    }

    public function updateBaru(Request $request, $id)
    {
        // $data=Request::all();
        // dd($request->all());
        $data = $request->all();
        $items = Auth()->user()->lecturers::findOrFail($id);
        $items->update($data);

        // kondisi upload foto
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $items->avatar = $request->file('avatar')->getClientOriginalName();
            $items->save();
        }

        return redirect()->route('lecturers.profilsaya');
    }
}
