<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ProdutoController extends Controller
{
    public function index()
    {

        $results = Products::select('name', 'price', 'active')->get();


        return $results;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|max:60|min:3',
            'price'  => 'required|max:6|min:2',
            'active'  => 'boolean'
        ]);

        $product = Products::create([
            'name'      => $request->input('name'),
            'price'     => $request->input('price'),
            'active'    => $request->input('active'),

        ]);

        return response()->json(['success' => true]);
    }
    public function show(Products $product)
    {
        return $product;
    }
    public function update(Request $request, Products $product)
    {
        if ($request->input('name')) {
            $product->name      = $request->input('name');
        }
        if ($request->input('price')) {
            $product->price     = $request->input('price');
        }
        if ($request->input('active')) {
            $product->active    = $request->input('active');
        }

        $product->save();
        return $product;
    }
    public function delete(Products $product)
    {
        $product->delete();
        return response()->json(['success' => true]);
    }
}