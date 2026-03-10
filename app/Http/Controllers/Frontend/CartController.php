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
            'addons'     => 'nullable|array'
        ]);

        $product = MenuItem::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        $addons = $request->addons ?? [];

        // Calculate addon total
        $addonTotal = 0;
        foreach ($addons as $addon) {
            $addonTotal += $addon['price'];
        }

        // Unique key based on product + addons
        $key = $product->id . '-' . md5(json_encode($addons));

        if (isset($cart[$key])) {

            $cart[$key]['quantity'] += (int) $request->quantity;

        } else {

            $cart[$key] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "price" => (float) $product->price,
                "image" => $product->image,
                "quantity" => (int) $request->quantity,
                "addons" => $addons,
                "addon_total" => $addonTotal
            ];
        }

        session()->put('cart', $cart);

        return $this->cartResponse($cart);
    }


    public function update(Request $request)
    {
        $request->validate([
            'product_key' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_key])) {

            $cart[$request->product_key]['quantity'] = (int) $request->quantity;

            session()->put('cart', $cart);
        }

        return $this->cartResponse($cart);
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

        return $this->cartResponse($cart);
    }


    public function removeAddon(Request $request)
    {
        $cart = session()->get('cart', []);

        $key = $request->product_key;
        $index = $request->addon_index;

        if (isset($cart[$key]['addons'][$index])) {

            unset($cart[$key]['addons'][$index]);

            $cart[$key]['addons'] = array_values($cart[$key]['addons']);

            // Recalculate addon total
            $addonTotal = 0;

            foreach ($cart[$key]['addons'] as $addon) {
                $addonTotal += $addon['price'];
            }

            $cart[$key]['addon_total'] = $addonTotal;
        }

        session()->put('cart', $cart);

        return $this->cartResponse($cart);
    }


    public function getCart()
    {
        $cart = session()->get('cart', []);

        return $this->cartResponse($cart);
    }


    private function cartResponse($cart)
    {

        $total = collect($cart)->sum(function ($item) {

            $addon = $item['addon_total'] ?? 0;

            return ($item['price'] + $addon) * $item['quantity'];

        });

        $cartCount = collect($cart)->sum('quantity');

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'total' => $total,
            'cartCount' => $cartCount
        ]);
    }

}