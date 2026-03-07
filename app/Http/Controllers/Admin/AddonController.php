<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Addon;
use App\Models\AddonGroup;
use Illuminate\Support\Facades\Storage;

class AddonController extends Controller
{

    public function index()
    {
        $addons = Addon::with('group')->latest()->get();

        return view('admin.addons.index', compact('addons'));
    }


    public function create()
    {
        $groups = AddonGroup::pluck('name','id');

        return view('admin.addons.create', compact('groups'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'name' => 'required'
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('addons','public');
        }

        Addon::create([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'price' => $request->price ?? 0,
            'image' => $imagePath,
            'has_flavors' => $request->has_flavors ?? 0
        ]);

        return redirect()->route('admin.addons.index')
        ->with('success','Addon created successfully');

    }


    public function edit(Addon $addon)
    {
        $groups = AddonGroup::pluck('name','id');

        return view('admin.addons.edit', compact('addon','groups'));
    }


    public function update(Request $request, Addon $addon)
    {
        $request->validate([
            'group_id' => 'required',
            'name' => 'required'
        ]);

        if($request->hasFile('image')){

            if($addon->image){
                Storage::disk('public')->delete($addon->image);
            }

            $addon->image = $request->file('image')->store('addons','public');
        }

        $addon->update([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'price' => $request->price ?? 0,
            'has_flavors' => $request->has_flavors ?? 0,
            'image' => $addon->image
        ]);

        return redirect()->route('admin.addons.index')
        ->with('success','Addon updated successfully');

    }


    public function destroy(Addon $addon)
    {

        if($addon->image){
            Storage::disk('public')->delete($addon->image);
        }

        $addon->delete();

        return back()->with('success','Addon deleted');

    }

}