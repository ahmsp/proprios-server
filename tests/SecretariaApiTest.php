<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SecretariaApiTest extends TestCase
{
    use MakeSecretariaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSecretaria()
    {
        $secretaria = $this->fakeSecretariaData();
        $this->json('POST', '/api/v1/secretarias', $secretaria);

        $this->assertApiResponse($secretaria);
    }

    /**
     * @test
     */
    public function testReadSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $this->json('GET', '/api/v1/secretarias/'.$secretaria->id);

        $this->assertApiResponse($secretaria->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $editedSecretaria = $this->fakeSecretariaData();

        $this->json('PUT', '/api/v1/secretarias/'.$secretaria->id, $editedSecretaria);

        $this->assertApiResponse($editedSecretaria);
    }

    /**
     * @test
     */
    public function testDeleteSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $this->json('DELETE', '/api/v1/secretarias/'.$secretaria->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/secretarias/'.$secretaria->id);

        $this->assertResponseStatus(404);
    }
}
