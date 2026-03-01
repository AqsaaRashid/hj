<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::with('category')->latest()->get();
        return view('admin.menu-items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menu-items','public');
        }

        MenuItem::create($data);

        return redirect()->route('admin.menu-items.index');
    }

    public function edit(MenuItem $menu_item)
    {
        $categories = Category::all();
        return view('admin.menu-items.edit', compact('menu_item','categories'));
    }

    public function update(Request $request, MenuItem $menu_item)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menu-items','public');
        }

        $menu_item->update($data);

        return redirect()->route('admin.menu-items.index');
    }

    public function destroy(MenuItem $menu_item)
    {
        $menu_item->delete();
        return back();
    }
}