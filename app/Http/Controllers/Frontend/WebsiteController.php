<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Offer;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->getMenuData($request);
        return view('index', $data);
    }

    public function menu(Request $request)
    {
        $data = $this->getMenuData($request);
        return view('menu', $data);
    }

   private function getMenuData($request)
{
    $offers = Offer::where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $categories = Category::withCount([
        'menuItems' => function ($q) {
            $q->where('status', 1);
        }
    ])
    ->where('status', 1)
    ->get();

    // 🔥 REMOVE ALL FILTERING HERE
    $products = MenuItem::where('status', 1)->get();

    return compact('offers', 'categories', 'products');
}
    
}