<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mouvement;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        // Cartes statistiques
        $totalProduits    = Product::count();
        $totalCategories  = Category::count();
        $totalEmployes    = User::where('role', 'employe')->count();
        $totalMouvements  = Mouvement::count();

        // Produits en stock faible (quantite <= 5)
        $produitsFaibles = Product::where('quantite', '>' , 5)->get();

        // Dernières opérations (5 dernières)
        $derniersMovements =  Mouvement::with('product', 'user')->latest()->take(5)->get();

        // Graphique entrées/sorties par mois (12 derniers mois)
        $mois = [];
        $entrees = [];
        $sorties = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $mois[] = $date->translatedFormat('M Y');

            $entrees[] =  Mouvement::where('type', 'entree')
                                  ->whereYear('created_at', $date->year)
                                  ->whereMonth('created_at', $date->month)
                                  ->sum('quantite');

            $sorties[] = Mouvement::where('type', 'sortie')
                                  ->whereYear('created_at', $date->year)
                                  ->whereMonth('created_at', $date->month)
                                  ->sum('quantite');
        }



        return view('index', compact(
            'totalProduits',
            'totalCategories',
            'totalEmployes',
            'totalMouvements',
            'produitsFaibles',
            'derniersMovements',
            'mois',
            'entrees',
            'sorties'
        ));
    }


}
