<?php

namespace App\Http\Controllers;

use App\Models\Lojas;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index()
    {
        // retorna todos os registros da tabela lojas
        $results = Lojas::all();


        return $results;
    }

    public function store(Request $request)
    {
        // validação de dados
        $request->validate([
            'nome'   => 'required|max:40|min:3',
            'email'  => 'required|email|unique:Lojas',
        ]);
        // recebe dados via post e insere um novo registro na tabela
        Lojas::create([
            'nome'      => $request->input('nome'),
            'email'     => $request->input('email'),
        ]);

        return response()->json(['success' => true]);
    }
    public function show(Lojas $loja)
    {
        // realiza uma consulta pelo id da loja fazendo um junção com a tabela de produtos,
        // para retornar todos os produtos da loja
        return Lojas::with('produtos')
            ->where('id', '=', $loja->id)
            ->get();
    }
    public function update(Request $request, Lojas $loja)
    {
        // validação de dados
        $request->validate([
            'nome'   => 'max:40|min:3',
            'email'  => 'required|email|unique:Lojas',
        ]);
        // recebe os dados via patch para atualizar os registros da loja selecionada pelo id
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
        // deleta o registro usando o id recebido
        $loja->delete();
        return response()->json(['success' => true]);
    }
}