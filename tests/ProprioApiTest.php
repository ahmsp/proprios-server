<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProprioApiTest extends TestCase
{
    use MakeProprioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProprio()
    {
        $proprio = $this->fakeProprioData();
        $this->json('POST', '/api/v1/proprios', $proprio);

        $this->assertApiResponse($proprio);
    }

    /**
     * @test
     */
    public function testReadProprio()
    {
        $proprio = $this->makeProprio();
        $this->json('GET', '/api/v1/proprios/'.$proprio->id);

        $this->assertApiResponse($proprio->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProprio()
    {
        $proprio = $this->makeProprio();
        $editedProprio = $this->fakeProprioData();

        $this->json('PUT', '/api/v1/proprios/'.$proprio->id, $editedProprio);

        $this->assertApiResponse($editedProprio);
    }

    /**
     * @test
     */
    public function testDeleteProprio()
    {
        $proprio = $this->makeProprio();
        $this->json('DELETE', '/api/v1/proprios/'.$proprio->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/proprios/'.$proprio->id);

        $this->assertResponseStatus(404);
    }
}
