<?php

namespace App\Http\Controllers;

use App\Http\Requests\mouvementRequest;
use App\Models\Mouvement;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mouvementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if( $user->role === "admin" ) {
            $mouvements = Mouvement::with('product', 'user')->latest()->get();
        } else {
            $mouvements = Mouvement::with('product', 'user')->where('user_id', $user->id)->latest()->get();

        }

        // dd($name);

        return view('mouvements.index', compact('mouvements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Product::all();
        return view('mouvements.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = Product::findorFail($request->produit_id);
        $stock = $produit->quantite;

        if ($request->type === "sortie") {
            if ($request->quantite > $stock) {
                return back()->with('error', "Stock insuffisant pour faire cette sortie");
            }
            $nouveauStock = $stock - $request->quantite;
        } else {
            $nouveauStock = $stock + $request->quantite;
        }

        // Mettre à jour la quantité du produit
        $produit->update(['quantite' => $nouveauStock]);

        // Enregistrer le mouvement
        Mouvement::create([
            'type'           => $request->type,
            'quantite'       => $request->quantite,
            'produit_id'     => $request->produit_id,
            'user_id'        => Auth::id(),
            'user_name'      => Auth::user()->name
        ]);

        return redirect()->route('mouvements.index')->with('message', "Opération enregistrée avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
