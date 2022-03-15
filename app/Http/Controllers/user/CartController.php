<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function error()
    {
        return view('user.pages.error.404');
    }
    public function index()
    {
        if (@Auth::user()->id) {
            $cart_detail = Cart::with('product_list', 'product_list.brand', 'product_list.category')->where('user_id', Auth::user()->id)->where('status', 'pading')->get();
            $cart_total = Cart::where('user_id', Auth::user()->id)->sum('total');
            return view('user.pages.cart.cart', compact('cart_detail', 'cart_total'));
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function show(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if (!empty($product)) {
            return view('user.pages.product.show', compact('product'));
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->id) {
            // dd($request->number);
            if ($request->number) {
                $number = $request->number;
            } else {
                $number = "1";
            }
            $cart = Product::where('id', $request->id)->first();
            $price = $cart->product_price * $number;
            $cart_list = Cart::create([
                'product_id' => $request->id,
                'user_id' => Auth::user()->id,
                'price' => $cart->product_price,
                'quantity' => $number,
                'total' => $price,
                'status' => 'pading',
            ]);

            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Cart SucessFully.']);

        } else {
            return response()->json(['status' => 'error', 'title' => 'Error!!', 'message' => 'Plz Login']);
        }

    }

    public function delete($id)
    {
        try {
            $checkCart = Cart::where('id', $id)->first();
            $checkCart->delete();
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Users deleted successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('userside.error');
        }
    }

}
