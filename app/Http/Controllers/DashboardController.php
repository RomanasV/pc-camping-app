<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Camping;
use App\User;

class DashboardController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id); 
        $campings = $user->campings()->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard')->with('campings', $campings);
    }
}
