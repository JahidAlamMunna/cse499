<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DoctorController extends Controller
{

    //show all doctors
    public function index(){
        $doctors = DB::table('doctors')->paginate(10);
        return view('doctor.doctors', ['doctors' => $doctors]);
    }

    //show a specific doctor
    public function show($id){
        $doctor = DB::table('doctors')->where('doc_id', $id)->first();
        return view('doctor.doctor', ['doctor' => $doctor]);
    
    }
    
    //show all doctor (admin panel)

    //show the add doctor form

    public function create(){
    
        return view('admin.doctor.create');

    }

    //store a row into the database

    public function store(Request $request){
        
        DB::table('doctors')->insert(
            [ 
                'doc_name' => $request->name,
                'doc_spec' => $request->spec,
                'doc_hospital'=> $request->hospital,
                'doc_contact' => $request->contact,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('admin.doctors');
    }

    //Edit 
    public function edit($id){
        $doctor = DB::table('doctors')->where('doc_id', $id)->first();
        return view('admin.doctor.edit', ['doctor' => $doctor]);
    }

    //delete
    public function destroy($id){

        DB::table('doctors')->where('doc_id', $id)->delete();
        
    }

    public function update($id, Request $request){
        DB::table('doctors')
            ->where('doc_id', $id)
            ->update(
                [ 
                    'doc_name' => $request->name,
                    'doc_spec' => $request->spec,
                    'doc_hospital'=> $request->hospital,
                    'doc_contact' => $request->contact,
                    'updated_at' => date('Y-m-d H:i:s')
                ]
        );

        return redirect()->route('admin.doctors');
    }





    
}


