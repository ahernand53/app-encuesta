<?php

namespace App\Http\Controllers;

use App\Stage;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $stages = Stage::all();

        return view('Administration.dashboard', [
            'users' => $users,
            'stages' => $stages
        ]);
    }
}
