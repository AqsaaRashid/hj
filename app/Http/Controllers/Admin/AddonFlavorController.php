<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddonFlavor;
use App\Models\Addon;

class AddonFlavorController extends Controller
{

    public function index()
    {
        $flavors = AddonFlavor::with('addon')->latest()->get();
        return view('admin.addon_flavors.index', compact('flavors'));
    }

    public function create()
    {
        $addons = Addon::pluck('name','id');
        return view('admin.addon_flavors.create', compact('addons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'addon_id' => 'required',
            'flavor' => 'required'
        ]);

        AddonFlavor::create($request->all());

        return redirect()->route('admin.addon-flavors.index')
        ->with('success','Flavor created successfully');
    }

    public function edit(AddonFlavor $addon_flavor)
    {
        $addons = Addon::pluck('name','id');
        return view('admin.addon_flavors.edit', compact('addon_flavor','addons'));
    }

    public function update(Request $request, AddonFlavor $addon_flavor)
    {
        $request->validate([
            'addon_id'=>'required',
            'flavor'=>'required'
        ]);

        $addon_flavor->update($request->all());

        return redirect()->route('admin.addon-flavors.index')
        ->with('success','Flavor updated');
    }

    public function destroy(AddonFlavor $addon_flavor)
    {
        $addon_flavor->delete();
        return back()->with('success','Flavor deleted');
    }
}