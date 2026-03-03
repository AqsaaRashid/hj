<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

   public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer|exists:menu_items,id',
        'quantity'   => 'required|integer|min:1',
    ]);

    $product = MenuItem::findOrFail($request->product_id);

    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += (int) $request->quantity;
    } else {
        $cart[$product->id] = [
            "name"     => $product->name,
            "price"    => (float) $product->price,
            "image"    => $product->image,
            "quantity" => (int) $request->quantity
        ];
    }

    session()->put('cart', $cart);

    $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
    $cartCount = collect($cart)->sum('quantity');

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'total' => $total,
        'cartCount' => $cartCount,
    ]);
}

public function update(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'quantity'   => 'required|integer|min:1'
    ]);

    $cart = session()->get('cart', []);

    if (isset($cart[$request->product_id])) {
        $cart[$request->product_id]['quantity'] = (int) $request->quantity;
        session()->put('cart', $cart);
    }

    $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
    $cartCount = collect($cart)->sum('quantity');

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'total' => $total,
        'cartCount' => $cartCount,
    ]);
}

public function remove(Request $request)
{
    $request->validate([
        'product_id' => 'required'
    ]);

    $cart = session()->get('cart', []);

    if (isset($cart[$request->product_id])) {
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);
    }

    $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
    $cartCount = collect($cart)->sum('quantity');

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'total' => $total,
        'cartCount' => $cartCount,
    ]);
}

public function getCart()
{
    $cart = session()->get('cart', []);

    $total = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
    $cartCount = collect($cart)->sum('quantity');

    return response()->json([
        'cart' => $cart,
        'total' => $total,
        'cartCount' => $cartCount
    ]);
}
}