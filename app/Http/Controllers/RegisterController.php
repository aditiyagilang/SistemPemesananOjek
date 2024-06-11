<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        event(new Registered($user));

        session()->put('emailToVerify', $request->email);

        // Auth::login($user);
        return redirect('/email/verify');
    }


    public function resend(Request $request)
    {

        $emailToVerify = session('emailToVerify');


        $user = User::where('email', $emailToVerify)->first();

        if ($user) {
            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
                return redirect('/email/verify')->with('status', 'Email verifikasi telah dikirim ulang.');
            } else {
                return redirect('/home')->with('status', 'Email sudah diverifikasi sebelumnya.');
            }
        } else {
            return redirect()->back()->with('status', 'Email tidak ditemukan.');
        }
    }


}
