<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class AppointmentController extends Controller
{
    public function store(Request $request){

    $data = DB::table('appointments')->insert(
        [ 
            'user_id' => \Auth::id(),
            'doctor_id' =>  $request->doctor_id,
            'app_date' => NULL,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('doctor.index')->with('success', 'Appointment Successfully Requested. You will be notified after confirmation.');

    }

    public function approve(Request $request){
        DB::table('appointments')
            ->where('app_id', $request->id)
            ->update(['app_date' => Carbon::now()->addDays(5)]);

            return redirect()->route('admin.appointments')->with('success', 'Appointment Successfully Approved.');

    }


}
