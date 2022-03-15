<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        if (@Auth::user()->id) {
            $countries = Country::get(["name", "id"]);
            $cart_detail = Cart::with('product_list', 'product_list.brand', 'product_list.category')->where('status', 'pading')->where('user_id', Auth::user()->id)->get();
            $cart_total = Cart::where('status', 'pading')->where('user_id', Auth::user()->id)->sum('total');
            return view('user.pages.cart.checkout', compact('cart_detail', 'cart_total', 'countries'));
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email, ' . $user->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        if (@Auth::user()->id) {
            $cart_total = Cart::with('product_list', 'product_list.brand', 'product_list.category')->where('status', 'pading')->where('user_id', Auth::user()->id)->get();
            $cart_total_price = Cart::where('status', 'pading')->where('user_id', Auth::user()->id)->sum('total');
            foreach ($cart_total as $cart) {
                Checkout::create([
                    'cart_id' => $cart->id,
                    'user_id' => Auth::user()->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                    'status' => 'sucess',
                ]);
                Cart::where('id', $cart->id)->update([
                    'status' => 'sucess',
                ]);
            }
            $NewDate = Date('Y-m-d', strtotime('+10 days'));
            $estimated_date = date('F jS, Y', strtotime($NewDate));
            $address = $request->address;
            // $date = $request->address;
            Mail::to($request->email)->send(new \App\Mail\OrderMail($cart_total, $cart_total_price, $address, $estimated_date));
            return view('user.pages.cart.order');
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
