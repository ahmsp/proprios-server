<?php

use Proprios\Models\Secretaria;
use Proprios\Repositories\SecretariaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SecretariaRepositoryTest extends TestCase
{
    use MakeSecretariaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SecretariaRepository
     */
    protected $secretariaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->secretariaRepo = App::make(SecretariaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSecretaria()
    {
        $secretaria = $this->fakeSecretariaData();
        $createdSecretaria = $this->secretariaRepo->create($secretaria);
        $createdSecretaria = $createdSecretaria->toArray();
        $this->assertArrayHasKey('id', $createdSecretaria);
        $this->assertNotNull($createdSecretaria['id'], 'Created Secretaria must have id specified');
        $this->assertNotNull(Secretaria::find($createdSecretaria['id']), 'Secretaria with given id must be in DB');
        $this->assertModelData($secretaria, $createdSecretaria);
    }

    /**
     * @test read
     */
    public function testReadSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $dbSecretaria = $this->secretariaRepo->find($secretaria->id);
        $dbSecretaria = $dbSecretaria->toArray();
        $this->assertModelData($secretaria->toArray(), $dbSecretaria);
    }

    /**
     * @test update
     */
    public function testUpdateSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $fakeSecretaria = $this->fakeSecretariaData();
        $updatedSecretaria = $this->secretariaRepo->update($fakeSecretaria, $secretaria->id);
        $this->assertModelData($fakeSecretaria, $updatedSecretaria->toArray());
        $dbSecretaria = $this->secretariaRepo->find($secretaria->id);
        $this->assertModelData($fakeSecretaria, $dbSecretaria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSecretaria()
    {
        $secretaria = $this->makeSecretaria();
        $resp = $this->secretariaRepo->delete($secretaria->id);
        $this->assertTrue($resp);
        $this->assertNull(Secretaria::find($secretaria->id), 'Secretaria should not exist in DB');
    }
}
