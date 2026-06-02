<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Product::with('category')->get();
        $stocks = Product::sum('quantite');
        return view('produits.index', compact('produits', 'stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('products.index')->with('message', "Produit ajouté avec succès !");

    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     return view('produits.show', compact('product'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('produits.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index')->with('message', "Produit mis à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('message', "Produit supprimé avec succès !");
    }
}
