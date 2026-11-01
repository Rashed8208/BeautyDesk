
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\RatingController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\FashionController;


Route::get('/', function () {
    return view('home');
})->name('home');

// Old /home URL use korleo main homepage e jabe.

Route::get('/home', function () {
    return redirect()->route('home');
});


// ========================================
// 2. CUSTOMER AUTHENTICATION
// ========================================

// Guest customer login and registration korte parbe.
// Logged-in customer abar login/register page e jabe na.

Route::middleware('guest:customer')->group(function () {

    Route::get('/login', [
        CustomerAuthController::class,
        'showLogin'
    ])->name('customer.login');

    Route::post('/login', [
        CustomerAuthController::class,
        'login'
    ])->name('customer.login.submit');


    Route::get('/register', [
        CustomerAuthController::class,
        'showRegister'
    ])->name('customer.register');

    Route::post('/register', [
        CustomerAuthController::class,
        'register'
    ])->name('customer.register.submit');

});


// ========================================
// 3. CUSTOMER LOGOUT
// ========================================

// Only authenticated customer logout korte parbe.

Route::middleware('auth:customer')->group(function () {

    Route::post('/logout', [
        CustomerAuthController::class,
        'logout'
    ])->name('customer.logout');

});


// ========================================
// 4. PUBLIC CART AND CHECKOUT PAGES
// ========================================

// Existing Blade page routes preserve kora hoyeche.
// Cart/checkout page-er nijer authentication logic thakle
// sheta controller/middleware-e check korte hobe.

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');


Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');


// ========================================
// 5. ADMIN LOGIN
// ========================================

// Admin login page guest web guard-er jonno.

Route::prefix('admin')
    ->middleware('guest:web')
    ->group(function () {

        Route::get('/login', [
            AdminAuthController::class,
            'showLogin'
        ])->name('admin.login');

        Route::post('/login', [
            AdminAuthController::class,
            'login'
        ])->name('admin.login.submit');

    });


// ========================================
// 6. PROTECTED ADMIN PANEL
// ========================================

// All routes in this group require authenticated admin.
// URL prefix: /admin

Route::prefix('admin')
    ->middleware('auth:web')
    ->group(function () {

        // ------------------------------------
        // 6.1 Admin Dashboard
        // ------------------------------------

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');


        // ------------------------------------
        // 6.2 Admin Logout
        // ------------------------------------

        Route::post('/logout', [
            AdminAuthController::class,
            'logout'
        ])->name('admin.logout');


        // ------------------------------------
        // 6.3 Country Management
        // ------------------------------------

        Route::resource('countries', CountryController::class)
            ->except(['show']);


        // ------------------------------------
        // 6.4 Category Management
        // ------------------------------------

        Route::resource('categories', CategoryController::class)
            ->except(['show']);


        // ------------------------------------
        // 6.5 Subcategory Management
        // ------------------------------------

        Route::resource(
            'sub-categories',
            SubCategoryController::class
        )->except(['show']);


        // ------------------------------------
        // 6.6 Brand Management
        // ------------------------------------

        Route::resource('brands', BrandController::class)
            ->except(['show']);


        // ------------------------------------
        // 6.7 Product Management
        // ------------------------------------

        Route::resource('products', ProductController::class);


        // ------------------------------------
        // 6.8 Order Management
        // ------------------------------------

        Route::get('/orders', [
            OrderController::class,
            'index'
        ])->name('admin.orders.index');


        Route::get('/orders/{order}', [
            OrderController::class,
            'show'
        ])->name('admin.orders.show');


        // ------------------------------------
        // 6.9 Order Items
        // ------------------------------------

        Route::get('/order-items', [
            OrderItemController::class,
            'index'
        ])->name('admin.order-items.index');


        // ------------------------------------
        // 6.10 Supplier Management
        // ------------------------------------

        Route::resource('suppliers', SupplierController::class)
            ->except(['show'])
            ->names('admin.suppliers');


        // ------------------------------------
        // 6.11 Purchase Management
        // ------------------------------------

        Route::get('/purchases', [
            PurchaseController::class,
            'index'
        ])->name('admin.purchases.index');


        Route::get('/purchases/create', [
            PurchaseController::class,
            'create'
        ])->name('admin.purchases.create');


        Route::post('/purchases', [
            PurchaseController::class,
            'store'
        ])->name('admin.purchases.store');


        Route::get('/purchases/{purchase}', [
            PurchaseController::class,
            'show'
        ])->name('admin.purchases.show');


        // ------------------------------------
        // 6.12 Stock Management
        // ------------------------------------

        Route::get('/stock', [
            StockController::class,
            'index'
        ])->name('admin.stock.index');


        Route::get('/stock/movements', [
            StockController::class,
            'movements'
        ])->name('admin.stock.movements');


        // ------------------------------------
        // 6.13 Currency Management
        // ------------------------------------

        Route::resource('currencies', CurrencyController::class)
            ->except(['show'])
            ->names('admin.currencies');


        // ------------------------------------
        // 6.14 Admin Review Management
        // ------------------------------------

        // Note:
        // Ekhane existing Customer\ReviewController use kora hoyeche,
        // karon tomar deya code-e ei controller import kora chilo.
        // Ei controller-e index(), approve(), reject() method thakte hobe.
        // Alada Admin\ReviewController thakle import o controller
        // class change korte hobe.

        Route::get('/reviews', [
            ReviewController::class,
            'index'
        ])->name('admin.reviews.index');


        Route::put('/reviews/{review}/approve', [
            ReviewController::class,
            'approve'
        ])->name('admin.reviews.approve');


        Route::put('/reviews/{review}/reject', [
            ReviewController::class,
            'reject'
        ])->name('admin.reviews.reject');

    });


// ========================================
// 7. AUTHENTICATED CUSTOMER FEATURES
// ========================================

// Customer-only routes.
// Ei routes ar admin prefix-er vitore nei.

Route::middleware('auth:customer')->group(function () {

    // ------------------------------------
    // 7.1 Wishlist
    // ------------------------------------

    Route::get('/wishlist', [
        WishlistController::class,
        'index'
    ])->name('wishlist.index');


    Route::post('/wishlist/add/{product}', [
        WishlistController::class,
        'store'
    ])->name('wishlist.store');


    Route::delete('/wishlist/remove/{id}', [
        WishlistController::class,
        'destroy'
    ])->name('wishlist.destroy');


    // ------------------------------------
    // 7.2 Customer Profile
    // ------------------------------------

    Route::get('/profile', [
        ProfileController::class,
        'show'
    ])->name('customer.profile.show');


    Route::get('/profile/edit', [
        ProfileController::class,
        'edit'
    ])->name('customer.profile.edit');


    Route::put('/profile', [
        ProfileController::class,
        'update'
    ])->name('customer.profile.update');


    // ------------------------------------
    // 7.3 Customer Ratings
    // ------------------------------------

    Route::get('/my-ratings', [
        RatingController::class,
        'index'
    ])->name('customer.ratings.index');


    Route::get('/products/{product}/rate', [
        RatingController::class,
        'show'
    ])->name('customer.ratings.show');


    Route::post('/products/{product}/ratings', [
        RatingController::class,
        'store'
    ])->name('customer.ratings.store');


    Route::put('/my-ratings/{rating}', [
        RatingController::class,
        'update'
    ])->name('customer.ratings.update');


    Route::delete('/my-ratings/{rating}', [
        RatingController::class,
        'destroy'
    ])->name('customer.ratings.destroy');


    // ------------------------------------
    // 7.4 Customer Reviews
    // ------------------------------------

    Route::get('/my-reviews', [
        ReviewController::class,
        'index'
    ])->name('customer.reviews.index');


    Route::post('/products/{product}/review', [
        ReviewController::class,
        'store'
    ])->name('customer.reviews.store');


    Route::get('/my-reviews/{review}/edit', [
        ReviewController::class,
        'edit'
    ])->name('customer.reviews.edit');


    Route::put('/my-reviews/{review}', [
        ReviewController::class,
        'update'
    ])->name('customer.reviews.update');


    Route::delete('/my-reviews/{review}', [
        ReviewController::class,
        'destroy'
    ])->name('customer.reviews.destroy');

});
 
// pages

Route::view('/saree', 'pages.saree')->name('saree');
Route::view('/kurti', 'pages.kurti')->name('kurti');
Route::view('/abayas-burqas', 'pages.abayas-burqas')->name('abayas-burqas');
Route::view('/three-piece', 'pages.three-piece')->name('three-piece');