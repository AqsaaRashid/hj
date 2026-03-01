<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
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
        $categories = Category::withCount([
            'menuItems' => function ($q) {
                $q->where('status', 1);
            }
        ])
        ->where('status', 1)
        ->get();

        if ($request->category_id) {
            $products = MenuItem::where('status', 1)
                ->where('category_id', $request->category_id)
                ->get();
        } else {
            $products = MenuItem::where('status', 1)->get();
        }

        return compact('categories', 'products');
    }
}