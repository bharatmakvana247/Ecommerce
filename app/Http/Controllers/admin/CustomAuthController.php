<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class CustomAuthController extends Controller
{

    public function loginCreate()
    {
        if (auth()->user()) {
            return redirect()->route('userside');
        } else {
            return view('admin.user.login');
        }
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {

            if (auth()->user()->is_Admin == 1) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with("message", "Login Successfully");
            } else {
                // User::where('id', Auth::user()->id)->update([
                //     'login_status' => 'online',
                // ]);
                return redirect()->route('userside')->with('message', "Welcome To CDS");
            }

        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors(
                    [
                        'password' => 'Wrong Password',
                    ],
                );
        }
    }

    public function logout()
    {
        User::where('id', Auth::user()->id)->update([
            'login_status' => 'offline',
        ]);
        Auth::logout();
        return redirect()->route('user.loginCreate')->with("error", "Logout Successfully");
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('welcome')->with("message", 'You are Login');
        } else {
            return redirect("/")->with("error", 'You are not allowed to access');
        }
    }

    public function profile(User $user)
    {
        return view('admin.profile.updateProfile')
            ->with([
                'user' => $user,
            ]);
    }

    public function updateProfile(User $user, Request $request)
    {

        if (!empty($request->password)) {
            $request->validate(['password' => 'min:6']);
            $user->update(['password' => bcrypt($request->password)]);
        }

        $validates = [
            'name' => 'required',
            'email' => 'required|unique:users,email, ' . $user->id,
        ];

        $request->validate(
            $validates,
        );
        if ($request->avatar) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getClientMimeType();
            $getFileName = $file->getFilename();
            $originalFilename = $file->getClientOriginalName();
            Storage::disk('public')->put($originalFilename, File::get($file));
            $user->update([
                'avatar' => $originalFilename,
            ]);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $user->update(
            $data,
        );

        return redirect()->route('logout');
    }

    // Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('userside');
            } else {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('12345678'),
                    'avatar' => $user->avatar,
                    'social_status' => 'google',
                ]);
                Auth::login($user);
                return redirect()->route('userside');
            }
        } catch (Exception $e) {
            return redirect('/');
        }

    }

    //Github Socialite
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('userside');
            } else {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('12345678'),
                    'avatar' => $user->avatar,
                    'social_status' => 'github',
                ]);
                Auth::login($user);
                return redirect()->route('userside');
            }
        } catch (Exception $e) {
            return redirect('/');
        }
    }

    public function userLogin()
    {
        return view('user.pages.user.login');
    }
}
