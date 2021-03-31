<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =   DB::table('users')->where('id', \Auth::id())->first();
        if($user){
            return view('auth.profile', ['user' => $user]);
        }
        else{
            return redirect()->route('home')->with('error','Page Does Not Exist!');
        }
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pro_pic = $request->file('profile_picture');
        $extension = $pro_pic->getClientOriginalExtension();
        Storage::disk('public')->put($pro_pic->getFilename().'.'.$extension,  File::get($pro_pic));
    

        DB::table('users')
            ->where('id', \Auth::id())
            ->update([
                'mime' => $pro_pic->getClientMimeType(),
                'original_filename' => $pro_pic->getClientOriginalName(),
                'filename' => $pro_pic->getFilename().'.'.$extension
                ]);

        return redirect()->route('profile')
                ->with('success','Profile Picture added successfully...');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
