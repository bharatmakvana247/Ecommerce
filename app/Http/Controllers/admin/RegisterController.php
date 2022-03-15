<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function register()
    {
        if (auth()->user()) {
            return redirect()->route('userside');
        } else {
            return view('admin.user.register');
        }
    }

    public function customRegister(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($request->avatar) {
            $file123 = $request->file('avatar');
            $extension = $file123->getClientOriginalExtension();
            $mimetype = $file123->getClientMimeType();
            $getfilename = $file123->getFilename();
            $original_filename = $file123->getClientOriginalName();
            Storage::disk('public')->put($original_filename, File::get($file123));

            $user = new User([
                'avatar' => $original_filename,
            ]);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return redirect("/")->with("message", "You have signed-in Successfully");

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
}
