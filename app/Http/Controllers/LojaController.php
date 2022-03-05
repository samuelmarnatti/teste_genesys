<?php

namespace App\Http\Controllers;

use App\Models\Lojas;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index()
    {

        $results = Lojas::all();


        return $results;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'   => 'required|max:40|min:3',
            'email'  => 'required|email|unique:Lojas',
        ]);

        Lojas::create([
            'nome'      => $request->input('nome'),
            'email'     => $request->input('email'),
        ]);

        return response()->json(['success' => true]);
    }
    public function show(Lojas $loja)
    {
        return Lojas::with('produtos')
            ->where('id', '=', $loja->id)
            ->get();
    }
    public function update(Request $request, Lojas $loja)
    {
        $request->validate([
            'nome'   => 'max:40|min:3',
            'email'  => 'required|email|unique:Lojas',
        ]);

        if ($request->input('nome')) {
            $loja->nome      = $request->input('nome');
        }
        if ($request->input('email')) {
            $loja->email     = $request->input('email');
        }


        $loja->save();
        return $loja;
    }
    public function delete(Lojas $loja)
    {
        $loja->delete();
        return response()->json(['success' => true]);
    }
}