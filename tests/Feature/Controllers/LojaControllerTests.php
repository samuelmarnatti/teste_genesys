<?php

namespace Tests\Feature\Controllers;

use App\Models\Lojas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LojaControllerTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //  testa se não ocorreu nenhum erro na resposta e se a estrutura das informações estão corretas
    public function testIndexReturnsDataInValidFormat()
    {
        $this->json('get', 'api/loja')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    [
                        'nome',
                        'email'
                    ]
                ]
            );
    }

    public function testStoreReturnsDataInValidFormat()
    {
        $this->json('post', 'api/loja?nome=teste&email=teste@teste.com')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success'
                ]
            );
    }
    public function testShowReturnsDataInValidFormat()
    {
        $id_shop = Lojas::select('id')->latest()->first();
        $this->json('get', 'api/loja/' . $id_shop['id'])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    [
                        'nome',
                        'email',
                        'produtos'
                    ]
                ]

            );
    }
    public function testUpdateReturnsDataInValidFormat()
    {
        $id_shop = Lojas::select('id')->latest()->first();
        $this->json('patch', 'api/loja/' . $id_shop['id'] . '?nome=testeup&email=teste@testeupdate.com')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [

                    'nome',
                    'email',
                ]
            );
    }
    public function testDeleteReturnsDataInValidFormat()
    {
        $id_shop = Lojas::select('id')->latest()->first();
        $this->json('delete', 'api/loja/' . $id_shop['id'])
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'success'
                ]
            );
    }
}