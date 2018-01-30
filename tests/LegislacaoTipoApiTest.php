<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LegislacaoTipoApiTest extends TestCase
{
    use MakeLegislacaoTipoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLegislacaoTipo()
    {
        $legislacaoTipo = $this->fakeLegislacaoTipoData();
        $this->json('POST', '/api/v1/legislacaoTipos', $legislacaoTipo);

        $this->assertApiResponse($legislacaoTipo);
    }

    /**
     * @test
     */
    public function testReadLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $this->json('GET', '/api/v1/legislacaoTipos/'.$legislacaoTipo->id);

        $this->assertApiResponse($legislacaoTipo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $editedLegislacaoTipo = $this->fakeLegislacaoTipoData();

        $this->json('PUT', '/api/v1/legislacaoTipos/'.$legislacaoTipo->id, $editedLegislacaoTipo);

        $this->assertApiResponse($editedLegislacaoTipo);
    }

    /**
     * @test
     */
    public function testDeleteLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $this->json('DELETE', '/api/v1/legislacaoTipos/'.$legislacaoTipo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/legislacaoTipos/'.$legislacaoTipo->id);

        $this->assertResponseStatus(404);
    }
}
