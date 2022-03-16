<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $slider_products = Product::with('brand')->orderBy('id', 'DESC')->limit(3)->get();
        $products = Product::with('brand')->get();
        $most_visited_products = Wishlist::with('product_list')->limit(8)->get();
        $new_arrival_products = Product::with('brand')->orderBy('id', 'DESC')->limit(8)->get();
        $best_sellerproducts = Checkout::with('checkout_list', 'checkout_list.product_list')->limit(8)->get();

        return view('user.layouts.index', compact('products', 'new_arrival_products', 'most_visited_products', 'best_sellerproducts', 'slider_products'));
    }

    public function slider_product()
    {
        $new_arrival_products = Product::with('brand')->orderBy('id', 'DESC')->get();
        return view('user.pages.slider.slider', compact('new_arrival_products'));
    }
    public function product(Request $request)
    {
        $category_list = Category::with('product_list')->get();
        $filterkey = "1";
        $recent_products = Product::with('category', 'brand')->skip(0)->take(4)->get();

        $search_query = $request->get('query');
        $search = $request->get('search');

        if ($search != "") {
            $products = Product::where('product_name', 'LIKE', '%' . $search . '%')
                ->orWhere('product_details', 'LIKE', '%' . $search . '% ')
                ->orWhere('product_price', 'LIKE', '%' . $search . '%')
                ->with('category')
                ->orderBy('id', 'DESC')->paginate(9);
            $brands = Brand::where('brand_name', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(9);
            $categories = Category::where('category_name', 'LIKE', '%' . $search . '%')->orderBy('id', 'DESC')->paginate(9);
            $counTotal = $products->count();
        } else {
            // $products = Product::orderBy('id', 'DESC')->get();
            $products = Product::orderBy('id', 'DESC')->paginate(9);
            $brands = Brand::get();
            $categories = Category::get();
            $counTotal = Product::count();
        }

        return view('user.pages.product.product', with([
            'products' => $products,
            'brand' => $brands,
            'categories' => $categories,
            'count_records' => $counTotal,
            'recent_products' => $recent_products,
            'category_list' => $category_list,
            'filterkey' => $filterkey,
        ]));
    }

    public function single_product(Request $request, $id)
    {
        $category_list = Category::with('product_list')->get();
        $recent_products = Product::with('brand')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
        $single_products = Product::with('category', 'brand')->where('id', $id)->first();
        $related_products = Product::with('category', 'brand')->where('id', '!=', $single_products->id)->where('brand_name', $single_products->brand_name)->get();
        $filterkey = $single_products->category_name;
        if (!empty($single_products)) {
            $review_detail = Review::with('user_detail')->where('product_id', $id)->get();
            return view('user.pages.product.single_product', with([
                'single_product' => $single_products,
                'review_detail' => $review_detail,
                'recent_products' => $recent_products,
                'category_list' => $category_list,
                'filterkey' => $filterkey,
                'related_products' => $related_products,
            ]));
        } else {
            return redirect()->route('userside.error');
        }
    }

    public function review(Request $request)
    {
        $review = new Review([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'review' => $request->review,
        ]);
        $review->save();

        $user_name = User::where('id', Auth::user()->id)->first();
        $review_detail = Review::where('id', $review->id)->first();
        $created_at = date_format($review_detail->created_at, 'd M Y H:iA');
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Data is successfully added',
                'review' => $request->review,
                'user_name' => $user_name->name,
                'created_at' => $created_at,

            ]);
        // return redirect('/userside/product')->with('message', 'Review Added');
    }

    public function category_list(Request $request)
    {
        if (!empty($request->min) || !empty($request->max)) {
            $min = (int) $request->min;
            $max = (int) $request->max;
            $products = Product::where('product_price', '>=', $min)->where('product_price', '<=', $max)->orderBy('id', 'DESC')->paginate(9);
            // $products = Product::whereBetween('product_price', [$min, $max])->orderBy('id', 'DESC')->paginate(9);
        } else {
            $products = Product::where('category_name', $request->category_id)->orderBy('id', 'DESC')->paginate(9);
        }
        $user_id = @Auth::user()->id;
        $brands = Brand::get();
        $categories = Category::get();

        // $wishlist = App\Models\Wishlist::where('product_id', $product->id)->get();
        if (sizeof($products) > 0) {

            return response()->json([
                'status' => 'success',
                'message' => 'Data is successfully',
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories,
                'user_id' => $user_id,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Not Data is successfully',
                'brands' => $brands,
                'user_id' => $user_id,
                'categories' => $categories,
            ]);
        }

    }

}
