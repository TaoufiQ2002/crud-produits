<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'prix' => $request->prix,
            'stock' => $request->stock
        ]);

        return redirect()->route('dashboard')->with('success', 'Produit créé avec succès');
    }
}
