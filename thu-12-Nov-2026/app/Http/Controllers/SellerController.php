<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\User;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::with('user')->get();

        return view('sellers.index', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('sellers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|unique:sellers,user_id',
        ]);

        Seller::create($validated);

        return redirect()->route('sellers.index')
            ->with('success', 'Seller created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        $seller->load('products');

        return view('sellers.show', compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        $users = User::all();

        return view('sellers.edit', compact('seller', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|unique:sellers,user_id,' . $seller->id,
        ]);

        $seller->update($validated);

        return redirect()->route('sellers.index')
            ->with('success', 'Seller updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        if ($seller->products()->exists()) {
            return redirect()->route('sellers.index')
                ->with('error', 'Cannot delete this seller because they still have products.');
        }

        $seller->delete();

        return redirect()->route('sellers.index')
            ->with('success', 'Seller deleted successfully!');
    }
}
