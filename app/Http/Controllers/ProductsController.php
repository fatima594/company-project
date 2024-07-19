<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    // عرض قائمة المنتجات
    public function index()
    {
        $products = products::all();
        return view('admin.products.index', compact('products'));
    }

    // عرض نموذج إضافة منتج جديد
    public function create()
    {
        return view('admin.products.create');
    }

    // تخزين منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $products = new Products();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $products->image = basename($imagePath);
        }

        $products->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // عرض نموذج تعديل منتج
    public function edit($id)
    {
        $products = Products::findOrFail($id);
        return view('admin.products.edit', compact('products'));
    }

    // تحديث منتج
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $products = Products::findOrFail($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $products->image = basename($imagePath);
        }

        $products->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // عرض تفاصيل منتج
    public function show($id)
    {
        $products = Products::findOrFail($id);
        return view('admin.products.show', compact('products'));
    }

    // حذف منتج
    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        if ($products->image) {
            // حذف الصورة من التخزين إذا كانت موجودة
            Storage::delete('products/' . $products->image);
        }
        $products->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
