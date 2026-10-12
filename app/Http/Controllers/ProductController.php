<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Product::with('category');

        // Pencarian (Search)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Pagination (5 data per halaman)
        $products = $query->latest()->paginate(5);
        $categories = Category::all();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'sku'         => 'required|unique:products',
            'name'        => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer'
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/products')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }
}