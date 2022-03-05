<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProdutoControllerTests extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexReturnsDataInValidFormat()
    {
        $this->json('get', 'api/produto')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    [

                        'nome',
                        'valor',
                        'ativo',
                        'loja_id'
                    ]
                ]
            );
    }
    // public function testShowReturnsDataInValidFormat()
    // {
    //     $this->json('get', 'api/produto/1')
    //         ->assertStatus(Response::HTTP_OK)
    //         ->assertJsonStructure(
    //             [
    //                 [
    //                     'id',
    //                     'nome',
    //                     'valor',
    //                     'ativo',
    //                     'loja_id'
    //                 ]
    //             ]
    //         );
    // }
}