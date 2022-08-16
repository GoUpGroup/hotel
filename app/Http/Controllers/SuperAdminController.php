<?php

namespace App\Http\Controllers;

use App\Models\User;

class SuperAdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is.super.admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
     
        try {
            return view('admin/home')->with([
                'users' => $users,
            ]);
        } catch (\Exception$e) {
            return view('error');
        }
    }
}
