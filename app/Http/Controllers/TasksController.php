<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Products;
use App\Models\Produtos;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {


        return Products::all();
    }

    public function store(Request $request)
    {
        $product = Products::create([
            'name'      => $request->input('name'),
            'price'     => $request->input('price'),
            'active'     => $request->input('active'),

        ]);
        return $request->input('nome');
    }
}