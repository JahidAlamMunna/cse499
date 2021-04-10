<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
        $med_count = DB::table('medicines')->count();
        $order_count = DB::table('orders')->count();
        $user_count = DB::table('users')->count();
        $doc_count = DB::table('doctors')->count();

        return view('admin.dashboard',['med_count'=>$med_count,  'order_count'=>$order_count, 'user_count'=>$user_count, 'doc_count'=>$doc_count]);
    }

    public function medicines(){
        $medicines = DB::table('medicines')->get();

        return view('admin.medicine.medicines', ['medicines' => $medicines]);
    }

    public function doctors(){    
        $doctors = DB::table('doctors')->get();
        return view('admin.doctor.doctors', ['doctors' => $doctors]);
    
    }


    public function orders(){
        $orders= DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('users.name','orders.created_at','orders.updated_at','orders.pay_method','orders.order_status','orders.user_id', 'orders.total', 'orders.order_id')
            ->get();

        return view('admin.order.orders',['orders'=>$orders]);
    }

    public function appointments(){

        $apps = DB::table('appointments')->get();
        $users = DB::table('users')->get();
        $docs = DB::table('doctors')->get();
    
        return view('admin.appointments.appointments',['apps' => $apps, 'users' => $users,'docs' => $docs]);
    }

}
