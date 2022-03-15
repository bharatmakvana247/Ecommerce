<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user_list = User::where('is_Admin', '0')->where('id', '!=', Auth::user()->id)->get();
        return view('user.pages.chat.chat', compact('user_list'));
    }
    public function show(Request $request)
    {
        $use = Auth::user()->id;
        $userID = $request->id;

        $allMessages = Chat::with('userInfoFrom')
            ->where(function ($query) use ($userID, $use) {
                return $query->where('recevice_id', $use)
                    ->where('send_id', $userID);
            })
            ->orWhere(function ($query) use ($userID, $use) {
                return $query->where('send_id', $use)
                    ->where('recevice_id', $userID);
            })
            ->get();
        $CountMessages = Chat::with('userInfoFrom')
            ->where(function ($query) use ($userID, $use) {
                return $query->where('recevice_id', $use)
                    ->where('send_id', $userID);
            })
            ->orWhere(function ($query) use ($userID, $use) {
                return $query->where('send_id', $use)
                    ->where('recevice_id', $userID);
            })
            ->count();
        Chat::where('send_id', $userID)->where('recevice_id', $use)->update([
            'status' => 'read',
        ]);
        $rece_detali = User::where('id', $userID)->first();
        if (sizeof($allMessages) > 0) {
            $renderedView = view("user.pages.chat.list", compact('allMessages', 'use', 'userID', 'CountMessages', 'rece_detali'))->render();
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Users deleted successfully.', 'html' => $renderedView]);
        } else {
            $allMessages = array();
            $renderedView = view("user.pages.chat.list", compact('allMessages', 'use', 'userID', 'CountMessages', 'rece_detali'))->render();
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Users deleted successfully.', 'html' => $renderedView]);
        }

    }

    public function store(Request $request)
    {
        $chat_list = Chat::create([
            'send_id' => Auth::user()->id,
            'recevice_id' => $request->recevice_id,
            'message' => $request->message,
        ]);
    }

    public function user_search(Request $request)
    {
        $search = $request->search;
        $user_list = User::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data is successfully',
            'user_list' => $user_list,
        ]);
    }
}
