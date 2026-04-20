<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




// Route::middleware('auth')->group(function () {

//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });

    // Route::resource('products', ProductController::class)
    //     ->middleware('admin'); // 👈 custom middleware



    // For Performance Testing

    Route::get('/users-test', function (Illuminate\Http\Request $request) {

        $search = $request->query('search');

    $users = User::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    })
    ->latest()
    ->paginate(10)
    ->withQueryString(); // 🔥 keep search in pagination

    return view('users_list', compact('users', 'search'));
    });


    //

    Route::get('/cart', [CartController::class, 'index']);
  

    Route::post('/checkout', [OrderController::class, 'store']);


     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

   //addToCart
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');


    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');


    //  Route::middleware('auth:sanctum')->apiResource('products', Api\ProductController::class);

    Route::get('/products', [ProductController::class,'index'])->name('products.index');
    Route::get('/products/{products}show', [ProductController::class,'show'])->name('products.show');

    //AdminMiddleware Group

    Route::middleware('admin')->group(function() {

    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/update', [ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy');

    
    });


   
});




require __DIR__.'/auth.php';
