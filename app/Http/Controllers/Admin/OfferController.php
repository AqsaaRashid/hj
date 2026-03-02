<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('sort_order')->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        Offer::create($request->all());
        return redirect()->route('admin.offers.index')
            ->with('success','Offer Created Successfully');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $offer->update($request->all());
        return redirect()->route('admin.offers.index')
            ->with('success','Offer Updated Successfully');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success','Offer Deleted');
    }
}