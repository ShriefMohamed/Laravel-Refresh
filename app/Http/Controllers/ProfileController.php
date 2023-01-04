<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $user_id = Auth::user()->id;
        return view('profile')->with(['user' => DB::table('users')->where('id', $user_id)->first()]);
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
//                return view('profile')->with(['success' => true, 'user' => DB::table('users')->where('id', $user_id)->first()]);
            }
            return back()->withInput();
        } catch (Exception $e) {
            return view('profile')->with(['exception' => $e]);
        }
    }
}
