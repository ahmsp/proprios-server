<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoApiTest extends TestCase
{
    use MakeTipoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTipo()
    {
        $tipo = $this->fakeTipoData();
        $this->json('POST', '/api/v1/tipos', $tipo);

        $this->assertApiResponse($tipo);
    }

    /**
     * @test
     */
    public function testReadTipo()
    {
        $tipo = $this->makeTipo();
        $this->json('GET', '/api/v1/tipos/'.$tipo->id);

        $this->assertApiResponse($tipo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTipo()
    {
        $tipo = $this->makeTipo();
        $editedTipo = $this->fakeTipoData();

        $this->json('PUT', '/api/v1/tipos/'.$tipo->id, $editedTipo);

        $this->assertApiResponse($editedTipo);
    }

    /**
     * @test
     */
    public function testDeleteTipo()
    {
        $tipo = $this->makeTipo();
        $this->json('DELETE', '/api/v1/tipos/'.$tipo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tipos/'.$tipo->id);

        $this->assertResponseStatus(404);
    }
}
