<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('site.pages.home.index');
})->name('home.index');
Route::get('/about', function () {
    return view('site.pages.about.index');
})->name('about.index');
Route::get('/contact', function () {
    return view('site.pages.contact.index');
})->name('contact.index')->middleware('age:15');
Route::get('/app', function () {
    return view('site.app');
})->name('app');

// Route::get('/products', [ProductController::class,'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
// Route::get('/products',[ProductController::class,'store'])->name('products.store');
// Route::get('/products/{product}/show', [ProductController::class,'show'] )->name('products.show');

Route::resource('products', ProductController::class);
Route::prefix('demo')->group(function () {
    Route::get('/response', function () {
        $products = [
            [
                'title' => 'product 1',
                'price' => '200.00',
                'description' => 'description for product 1',
                'offer' => '150',
                'is_new' => true,
            ],
            [

                'title' => 'product 2',
                'price' => '200.00',
                'description' => 'description for product 2',
                'offer' => '150',
                'is_new' => true,

            ],
            [

                'title' => 'product 3',
                'price' => '200.00',
                'description' => 'description for product 3',
                'offer' => '150',
                'is_new' => false,

            ],
        ];

        return response($products, 202)
            ->header('Content-Type', 'application/json')
            ->cookie('NAME', 'shenouda', 60 * 60);
    });
    Route::get('/redirect', function () {
        return redirect('contact');
    });
    Route::get('/back', function () {
        return redirect()->back();
    });
    Route::get('/name-route', function () {
        return redirect()->route('products.create');
    });
    Route::get('/away', function () {
        return redirect()->away('http://google.com');
    });
    Route::get('/json', function () {
        $products = [
            [
                'title' => 'product 1',
                'price' => '200.00',
                'description' => 'description for product 1',
                'offer' => '150',
                'is_new' => true,
            ],
            [

                'title' => 'product 2',
                'price' => '200.00',
                'description' => 'description for product 2',
                'offer' => '150',
                'is_new' => true,

            ],
            [

                'title' => 'product 3',
                'price' => '200.00',
                'description' => 'description for product 3',
                'offer' => '150',
                'is_new' => false,

            ],
        ];

        return response()->json($products);
    });
    Route::get('/download', function () {

        return response()->download(public_path('fcb.jpg'), 'goat.jpg');
    });
});
