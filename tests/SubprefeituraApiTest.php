<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubprefeituraApiTest extends TestCase
{
    use MakeSubprefeituraTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSubprefeitura()
    {
        $subprefeitura = $this->fakeSubprefeituraData();
        $this->json('POST', '/api/v1/subprefeituras', $subprefeitura);

        $this->assertApiResponse($subprefeitura);
    }

    /**
     * @test
     */
    public function testReadSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $this->json('GET', '/api/v1/subprefeituras/'.$subprefeitura->id);

        $this->assertApiResponse($subprefeitura->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $editedSubprefeitura = $this->fakeSubprefeituraData();

        $this->json('PUT', '/api/v1/subprefeituras/'.$subprefeitura->id, $editedSubprefeitura);

        $this->assertApiResponse($editedSubprefeitura);
    }

    /**
     * @test
     */
    public function testDeleteSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $this->json('DELETE', '/api/v1/subprefeituras/'.$subprefeitura->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/subprefeituras/'.$subprefeitura->id);

        $this->assertResponseStatus(404);
    }
}
