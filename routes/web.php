<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomAuthController;
use App\Http\Controllers\admin\ForgetPasswordController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\user\AboutusController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\ChatController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\MainController;
use App\Http\Controllers\user\WishlistController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use Illuminate\Support\Facades\Route;

Route::get('students', [StudentController::class, 'index']);

Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');

//======================================================== Admin-Side =======================================================
// Route::get('/adminside', function () {
//     return view('welcome');
// });

Route::get('/ind', function () {
    return view('user.layouts.ind');
});

//======================== User ===============================
Route::get('/', [CustomAuthController::class, 'loginCreate'])
    ->name('user.loginCreate');
Route::prefix('/adminside')->group(function () {
    Route::post('/login/store', [CustomAuthController::class, 'customLogin'])
        ->name('user.customLogin');
    Route::get('/', [CustomAuthController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/user/logout', [CustomAuthController::class, 'logout'])
        ->name('logout');
});

// ================== Register ==============================
Route::prefix('/adminside')->group(function () {
    Route::get('/register', [RegisterController::class, 'register'])
        ->name('User.RegisterCreate');
    Route::post('/register/store', [RegisterController::class, 'customRegister'])
        ->name('user.customRegister');
});
// =========================== Socialite ============================
//Google
Route::get('adminside/login/google', [CustomAuthController::class, 'redirectToGoogle'])
    ->name('login.google');
Route::get('adminside/login/google/callback', [CustomAuthController::class, 'handleGoogleCallback'])
    ->name('login.google.callback');
//GitHub
Route::get('adminside/login/github', [CustomAuthController::class, 'redirectToGithub'])
    ->name('login.github');
Route::get('adminside/login/github/callback', [CustomAuthController::class, 'handleGithubCallback'])
    ->name('login.github.callback');
// =========================== Forget Password ================================
Route::get('/admin/forget_email', [ForgetPasswordController::class, 'create'])
    ->name('forget.create');
Route::post('/admin/forget_email/store', [ForgetPasswordController::class, 'store'])
    ->name('forget.store');
Route::get('/admin/reset_email/{token}', [ForgetPasswordController::class, 'showResetPassword'])
    ->name('reset.create');
Route::post('/admin/reset_email', [ForgetPasswordController::class, 'storeResetPassword'])
    ->name('reset.store');

// =========================== Admin Profie ================================
Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/user/profile/edit', [RegisterController::class, 'profile'])
        ->name('profile');
    Route::post('/user/profile/update/{user}', [RegisterController::class, 'updateProfile'])
        ->name('profile.update');
});

//============================= Admin Product ===================================
Route::get('admin/product/create', [ProductController::class, 'create'])
    ->name('product.create');
Route::post('admin/product/store', [ProductController::class, 'store'])
    ->name('product.store');
Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/product/index', [ProductController::class, 'index'])
        ->name('product.index');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
        ->name('product.edit');
    Route::post('/product/update/{product}', [ProductController::class, 'update'])
        ->name('product.update');
    Route::get('/product/delete/{product}', [ProductController::class, 'delete'])
        ->name('product.delete');

    //===================================== Admin Category ==================================
    Route::get('/category/create', [CategoryController::class, 'create'])
        ->name('category_create');
    Route::post('/category/store', [CategoryController::class, 'store'])
        ->name('category_store');
    Route::get('/category/index', [CategoryController::class, 'index'])
        ->name('category_index');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])
        ->name('category_edit');
    Route::post('/category/update/{category}', [CategoryController::class, 'update'])
        ->name('category_update');
    Route::get('/category/delete/{category}', [CategoryController::class, 'remove'])
        ->name('category_delete');
    //==================================== Admin Brand ======================================
    Route::get('/brand/create', [BrandController::class, 'create'])
        ->name('brand_create');
    Route::post('/brand/store', [BrandController::class, 'store'])
        ->name('brand_store');
    Route::get('/brand/index', [BrandController::class, 'index'])
        ->name('brand_index');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])
        ->name('brand_edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])
        ->name('brand_update');
    Route::get('/brand/delete/{brand}', [BrandController::class, 'remove'])
        ->name('brand_delete');

});

// ========================================================== User-Side ===============================================================================

// ==================Product=============================
Route::prefix('/userside')->group(function () {
    Route::get('/', [MainController::class, 'index'])
        ->name('userside');
    Route::get('/product', [MainController::class, 'product'])
        ->name('userside.product');
    Route::get('/single_product/{id}', [MainController::class, 'single_product'])
        ->name('userside.single_product');
    Route::post('/review', [MainController::class, 'review'])
        ->name('userside.review');
    Route::get('/category_list', [MainController::class, 'category_list'])
        ->name('userside.category_list');
    Route::get('/price_filter', [MainController::class, 'category_list'])
        ->name('userside.price_filter');
    Route::get('/product_list', [MainController::class, 'slider_product'])
        ->name('userside.slider_product');

    // Route::get('/autocompleteSearch', [MainController::class, 'autocompleteSearch'])->name('userside.autocompleteSearch');
});

//========================= User-Register =================
Route::prefix('/userside')->group(function () {
    Route::get('user/login', [CustomAuthController::class, 'userLogin'])
        ->name('userside.login');
});

//========================= Contact =================
Route::prefix('/userside')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])
        ->name('userside.contact');
    Route::post('/contact/store', [ContactController::class, 'store'])
        ->name('userside.contact.store');

});

//========================= About Us =================
Route::prefix('/userside')->group(function () {
    Route::get('/about', [AboutusController::class, 'index'])
        ->name('userside.about');
});

//========================= Profile =================
Route::prefix('/userside')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('userside.profile.edit');
    Route::post('/profile/update/{user}', [ProfileController::class, 'updateProfile'])
        ->name('userside.profile.update');
});

//========================= User Cart =================
Route::prefix('/userside')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])
        ->name('userside.cart');
    Route::get('/product/show', [CartController::class, 'show'])
        ->name('userside.product.show');
    Route::post('/cart/store', [CartController::class, 'store'])
        ->name('userside.cart.store');
    Route::post('/cart/delete/{id}', [CartController::class, 'delete'])
        ->name('userside.cart.delete');
});

//========================= Wishlist =================
Route::prefix('/userside')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])
        ->name('userside.wishlist');
    // Route::get('/product/show', [CartController::class, 'show'])
    //     ->name('userside.product.show');
    Route::post('/wishlist/store/{id}', [WishlistController::class, 'store'])
        ->name('userside.wishlist.store');
    Route::post('/wishlist/delete/{id}', [WishlistController::class, 'delete'])
        ->name('userside.wishlist.delete');
    Route::post('/wishlist/addtocart/{id}', [WishlistController::class, 'addtocart'])
        ->name('userside.wishlist.addtocart');
});

//========================= Checkout =================
Route::prefix('/userside')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('userside.checkout');
    // Route::get('/product/show', [CartController::class, 'show'])
    //     ->name('userside.product.show');
    Route::post('/checkout/store', [CheckoutController::class, 'store'])
        ->name('userside.checkout.store');
    // Route::get('dependent-dropdown', [DropdownController::class, 'index']);
    Route::post('api/fetch-states', [CheckoutController::class, 'fetchState'])->name('userside.fetch-states');
    Route::post('api/fetch-cities', [CheckoutController::class, 'fetchCity'])->name('userside.fetch-cities');
    // Route::post('/wishlist/delete/{id}', [WishlistController::class, 'delete'])
    //     ->name('userside.wishlist.delete');
    // Route::post('/wishlist/addtocart/{id}', [WishlistController::class, 'addtocart'])
    //     ->name('userside.wishlist.addtocart');
});

Route::prefix('/userside')->group(function () {
    Route::get('/error', [CartController::class, 'error'])
        ->name('userside.error');
});

//========================= Chat =================
Route::prefix('/userside')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])
        ->name('userside.chat');
    Route::get('/chat/show', [ChatController::class, 'show'])
        ->name('userside.chat.show');
    Route::get('/chat/store', [ChatController::class, 'store'])
        ->name('userside.chat.store');
    Route::get('/chat/user_search', [ChatController::class, 'user_search'])
        ->name('userside.chat.user_search');
});
