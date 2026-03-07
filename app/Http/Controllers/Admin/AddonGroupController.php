<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddonGroup;

class AddonGroupController extends Controller
{

    public function index()
    {
        $groups = AddonGroup::latest()->get();

        return view('admin.addon_groups.index',compact('groups'));
    }


    public function create()
    {
        return view('admin.addon_groups.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        AddonGroup::create([
            'name' => $request->name,
            'status' => $request->status ?? 1
        ]);

        return redirect()->route('admin.addon-groups.index')
        ->with('success','Group created successfully');
    }


    public function edit(AddonGroup $addon_group)
    {
        return view('admin.addon_groups.edit',compact('addon_group'));
    }


    public function update(Request $request,AddonGroup $addon_group)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $addon_group->update([
            'name'=>$request->name,
            'status'=>$request->status ?? 1
        ]);

        return redirect()->route('admin.addon-groups.index')
        ->with('success','Group updated');
    }


    public function destroy(AddonGroup $addon_group)
    {
        $addon_group->delete();

        return back()->with('success','Group deleted');
    }

}