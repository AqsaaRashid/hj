<?php
use App\Models\Order;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AddonGroupController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\AddonFlavorController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\ContactController;
// contactus

Route::post('/contact-submit',[ContactController::class,'store'])->name('contact.store');

Route::get('/admin/contacts',[ContactController::class,'index'])->name('contacts.index');

Route::get('/admin/contacts', [ContactController::class, 'index'])
    ->name('admin.contacts.index');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])
    ->name('admin.contacts.destroy');
    Route::get('/admin/contacts/{id}',[ContactController::class,'show'])
    ->name('admin.contacts.show');

Route::post('/admin/contacts/{id}/reply',
    [ContactController::class,'reply'])
    ->name('admin.contacts.reply');


    // contact
    Route::get('/admin/contact-count', function () {

    $count = \App\Models\Contact::where('is_seen', false)->count();

    return response()->json([
        'count' => $count
    ]);

});
    // sample
Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});
Route::get('menu', function () {
    return view('menu');
});
Route::get('privacy', function () {
    return view('privacy');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('faqs', function () {
    return view('faqs');
});


// routes
Route::get('/admin/order-count', function () {

    $count = Order::where('is_seen', false)->count();

    return response()->json([
        'count' => $count
    ]);

});
// payment
// STRIPE PAYMENT
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('place.order');

Route::post('/stripe/checkout', [StripeController::class, 'checkout'])
    ->name('stripe.checkout');


Route::get('/payment-success', [StripeController::class, 'success'])
    ->name('payment.success');

Route::get('/payment-cancel', [StripeController::class, 'cancel'])
    ->name('payment.cancel');

    Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// cart

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/get', [CartController::class, 'getCart'])->name('cart.get');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove-addon',[CartController::class,'removeAddon'])
->name('cart.remove-addon');
// checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/apply-promo', [CheckoutController::class, 'applyPromo'])->name('promo.apply');
Route::post('/checkout/next', [CheckoutController::class, 'storeCustomer'])->name('checkout.next');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::post('/checkout/next', [CheckoutController::class, 'next'])->name('checkout.next');

// website
Route::get('/', [WebsiteController::class,'index'])->name('home');
Route::get('/menu', [WebsiteController::class,'menu'])->name('menu');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('categories', CategoryController::class);
    Route::resource('menu-items', MenuItemController::class);

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
    
       Route::patch('/orders/{order}/update-status',
    [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');

Route::patch('/orders/{order}/update-payment',
    [OrderController::class, 'updatePayment'])
    ->name('orders.updatePayment');
    Route::delete('/orders/bulk-delete',
    [OrderController::class, 'bulkDelete'])
    ->name('orders.bulkDelete');
  

Route::get('/orders-trash',
    [OrderController::class, 'trash'])
    ->name('orders.trash');

Route::patch('/orders/{id}/restore',
    [OrderController::class, 'restore'])
    ->name('orders.restore');

Route::delete('/orders/{id}/force-delete',
    [OrderController::class, 'forceDelete'])
    ->name('orders.forceDelete');

    Route::resource('addon-groups', AddonGroupController::class);
Route::resource('addons', AddonController::class);
Route::resource('addon-flavors', AddonFlavorController::class);
});



Route::resource('admin/offers', \App\Http\Controllers\Admin\OfferController::class)
    ->names('admin.offers');
    Route::get('/get-products', [WebsiteController::class, 'getProducts']);

Route::get('/dashboard',
    [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
