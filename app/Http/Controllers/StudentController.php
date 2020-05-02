<?php

namespace App\Http\Controllers;
use AuthenticatesUsers;

use App\Models\Student;
use App\User;
use Auth;

use App\Http\Requests\StudentRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Student::all();
        return view('pages.students.index')->with([
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
        $user->role = "mahasiswa";
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('admin123');
        $user->remember_token = Str::random(60);
        $user->save();

         // insert ke tabel mahasiswa
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        Student::create($data);

        return redirect()->route('students.index');
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
        $items = Student::findOrFail($id);
        return view('pages.students.edit')->with([
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
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $items = Student::findOrFail($id);
        $items->update($data);

         // kondisi upload foto
         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $items->avatar = $request->file('avatar')->getClientOriginalName();
            $items->save();
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Student::findOrfail($id);
        $item->delete();

        return redirect()->route('students.index');
    }

    public function profile($id)
    {
        $items = Student::findOrFail($id);
        return view('pages.students.profile')->with([
            'items' => $items
        ]);
    }

    public function profilSaya()
    {
        $items = Auth()->user()->students;
        return view('pages.students.profilsaya',compact(['items']));
    }

    public function updateBaru(Request $request, $id)
    {
        // $data=Request::all();
        // dd($request->all());
        $data = $request->all();
        $items = Auth()->user()->students::findOrFail($id);
        $items->update($data);

        // kondisi upload foto
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $items->avatar = $request->file('avatar')->getClientOriginalName();
            $items->save();
        }

        return redirect()->route('students.profilsaya');
    }
}
