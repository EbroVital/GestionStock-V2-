<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:categories,libelle',
        ]);

        Category::create($validated);

        return Redirect()->route('categories.index')->with('message', 'Catégorie enregistrée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('products');
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:categories,libelle,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('message', 'Mise à jour effectuée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ( $category->products()->count() > 0){
            return redirect()->route('categories.index')->with('message', "Impossible de supprimer cette catégorie car elle contient '{$category->products()->count()}' produits");
        }

        $libelle = $category->libelle;
        $category->delete();

        return redirect()->route('categories.index')->with('message', "La catégorie '{$libelle}' a été supprimé avec succès");
    }
}
