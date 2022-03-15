<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        if (@Auth::user()->id) {
            $wishlist_details = Wishlist::with('product_list', 'product_list.brand', 'product_list.category')->where('user_id', Auth::user()->id)->get();
            return view('user.pages.wishlist.wishlist', compact('wishlist_details'));
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function delete($id)
    {
        try {
            $checkCart = Wishlist::where('id', $id)->first();
            $checkCart->delete();
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Wishlist deleted successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('userside.error');
        }
    }

    public function addtocart($id)
    {
        try {
            $checkCart = Wishlist::where('id', $id)->first();
            Cart::create([
                'product_id' => $checkCart->product_id,
                'user_id' => Auth::user()->id,
                'price' => $checkCart->price,
                'quantity' => "1",
                'total' => $checkCart->price,
            ]);
            $checkCart->delete();
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Wishlist deleted successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('userside.error');
        }
    }

    public function store($id)
    {
        try {
            $checkCart = Wishlist::where('product_id', $id)->first();
            if (!empty($checkCart)) {
                $checkCart->delete();
            } else {

                $products = Product::where('id', $id)->first();
                Wishlist::create([
                    'product_id' => $products->id,
                    'user_id' => Auth::user()->id,
                    'price' => $products->product_price,
                ]);
            }
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Wishlist Add successfully.']);
        } catch (\Exception $e) {
            return redirect()->route('userside.error');
        }
    }
}
