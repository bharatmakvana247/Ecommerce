<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.pages.profile.my_account');
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
