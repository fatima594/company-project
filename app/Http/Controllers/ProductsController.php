<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::all();

        return view('admin.products.index', compact('products'));

    }





/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        products::create($data);
        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = products::findOrFail($id);
        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = products::findOrFail($id);
        return view('admin.products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $products = products::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($products->image) {
                Storage::disk('public')->delete($products->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        $products->update($data);
        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = products::findOrFail($id);

        // حذف الصورة إذا كانت موجودة
        if ($products->image) {
            Storage::disk('public')->delete($products->image);
        }

        $products->delete();
        return redirect()->route('admin.products.index');
    }
}
