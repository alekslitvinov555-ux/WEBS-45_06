<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PUBLIC CATALOG
    |--------------------------------------------------------------------------
    */
    public function index(Request $r)
    {
        $products = Product::query()
            ->with('category')
            ->when($r->search, fn($q) => $q->where('model','like',"%$r->search%")
                                          ->orWhere('make','like',"%$r->search%"))
            ->when($r->category, fn($q) => $q->where('category_id', $r->category))
            ->when($r->min, fn($q) => $q->where('price', '>=', $r->min))
            ->when($r->max, fn($q) => $q->where('price', '<=', $r->max))
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        // ПУБЛИЧНАЯ СТРАНИЦА КАТАЛОГА
        return view('products.index', compact('products','categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN PANEL
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $products = Product::with('category')->latest()->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Vehicle created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product'    => $product,
            'categories' => Category::all(),
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Vehicle updated!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')
                         ->with('success', 'Vehicle deleted.');
    }
}
