<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DistritoApiTest extends TestCase
{
    use MakeDistritoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDistrito()
    {
        $distrito = $this->fakeDistritoData();
        $this->json('POST', '/api/v1/distritos', $distrito);

        $this->assertApiResponse($distrito);
    }

    /**
     * @test
     */
    public function testReadDistrito()
    {
        $distrito = $this->makeDistrito();
        $this->json('GET', '/api/v1/distritos/'.$distrito->id);

        $this->assertApiResponse($distrito->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDistrito()
    {
        $distrito = $this->makeDistrito();
        $editedDistrito = $this->fakeDistritoData();

        $this->json('PUT', '/api/v1/distritos/'.$distrito->id, $editedDistrito);

        $this->assertApiResponse($editedDistrito);
    }

    /**
     * @test
     */
    public function testDeleteDistrito()
    {
        $distrito = $this->makeDistrito();
        $this->json('DELETE', '/api/v1/distritos/'.$distrito->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/distritos/'.$distrito->id);

        $this->assertResponseStatus(404);
    }
}
