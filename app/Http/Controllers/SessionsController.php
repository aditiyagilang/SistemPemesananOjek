<?php

namespace App\Http\Controllers;

Use Str;
// Use Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $attributes['email'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Email Tidak Terverifikasi / Salah'
            ]);
        }

        if (!password_verify($attributes['password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password Salah'
            ]);
        }

        if ($user->email_verified_at === null) {
            return redirect()->route('verification.notice')
                ->with('message', 'Akun belum diverifikasi. Silakan cek email untuk verifikasi.');
        }

        auth()->login($user);

        if ($user->level === 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }




    public function show(){
        request()->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            request()->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);

    }

    public function update(){

        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => ($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    // public function destroy()
    // {
    //     auth()->logout();

    //     return redirect('/');
    // }
    public function destroy()
    {
        auth()->logout();
        session()->flush(); // Hapus semua data dari session
        return redirect('/'); // Ganti dengan nama route halaman landingpemuda
    }

}
