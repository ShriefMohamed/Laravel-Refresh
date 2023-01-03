<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }

    public function profile()
    {
        $user_id = Auth::user()->id;
        return view('profile')->with(['user' => DB::table('users')->where('id', $user_id)->first()]);
    }

    public function chat()
    {
        return view('chat');
    }

    public function profile_update(Request $request)
    {
        $user_id = Auth::user()->id;

        $validate_request = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:rfc,dns']
        ]);

        try {
            $update = DB::table('users')->where('id', $user_id)->update(['name' => $validate_request['name'], 'email' => $validate_request['email']]);
            if ($update == 1) {
                return back()->withInput();
//                return view('profile')->with(['success' => true, 'user' => DB::table('users')->where('id', $user_id)->first()]);
            }
        } catch (Exception $e) {
            return view('profile')->with(['exception' => $e]);
        }
    }
}
