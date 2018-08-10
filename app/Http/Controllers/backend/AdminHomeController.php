<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role_id == 1) {
                $total_bill = Bill::count();
                $total_bill_1 = Bill::where('status', 1)->count();
                $total_bill_0 = Bill::where('status', 0)->count();
            } else {
                $user_id = Auth::user()->id;
                $total_bill = Bill::where('user_info', $user_id)->count();
                $total_bill_1 = Bill::where('status', 1)->where('user_info', $user_id)->count();
                $total_bill_0 = Bill::where('status', 0)->where('user_info', $user_id)->count();
            }
            return view('backend.index', compact('total_bill', 'total_bill_0', 'total_bill_1'));
        } else {
            return redirect()->route('home');
        }


    }

}
