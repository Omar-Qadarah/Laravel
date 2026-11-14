<?php

namespace App\Http\Controllers;

use App\Models\Catigore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatigoreController extends Controller
{
    public function index()
    {
        $categories = Catigore::all();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'status' => 'required|boolean',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }
        $validated['image'] = $imagePath;
        // dd($validated);
        Catigore::create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    public function edit($id)
    {
        $category = Catigore::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Catigore::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'status' => 'required|boolean',
        ]);
        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        } else {
            $validated['image'] = $category->image;
        }
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Catigore::findOrFail($id);
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');

    }

}
