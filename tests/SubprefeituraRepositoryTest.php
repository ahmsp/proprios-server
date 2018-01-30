<?php

use Proprios\Models\Subprefeitura;
use Proprios\Repositories\SubprefeituraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubprefeituraRepositoryTest extends TestCase
{
    use MakeSubprefeituraTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubprefeituraRepository
     */
    protected $subprefeituraRepo;

    public function setUp()
    {
        parent::setUp();
        $this->subprefeituraRepo = App::make(SubprefeituraRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSubprefeitura()
    {
        $subprefeitura = $this->fakeSubprefeituraData();
        $createdSubprefeitura = $this->subprefeituraRepo->create($subprefeitura);
        $createdSubprefeitura = $createdSubprefeitura->toArray();
        $this->assertArrayHasKey('id', $createdSubprefeitura);
        $this->assertNotNull($createdSubprefeitura['id'], 'Created Subprefeitura must have id specified');
        $this->assertNotNull(Subprefeitura::find($createdSubprefeitura['id']), 'Subprefeitura with given id must be in DB');
        $this->assertModelData($subprefeitura, $createdSubprefeitura);
    }

    /**
     * @test read
     */
    public function testReadSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $dbSubprefeitura = $this->subprefeituraRepo->find($subprefeitura->id);
        $dbSubprefeitura = $dbSubprefeitura->toArray();
        $this->assertModelData($subprefeitura->toArray(), $dbSubprefeitura);
    }

    /**
     * @test update
     */
    public function testUpdateSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $fakeSubprefeitura = $this->fakeSubprefeituraData();
        $updatedSubprefeitura = $this->subprefeituraRepo->update($fakeSubprefeitura, $subprefeitura->id);
        $this->assertModelData($fakeSubprefeitura, $updatedSubprefeitura->toArray());
        $dbSubprefeitura = $this->subprefeituraRepo->find($subprefeitura->id);
        $this->assertModelData($fakeSubprefeitura, $dbSubprefeitura->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSubprefeitura()
    {
        $subprefeitura = $this->makeSubprefeitura();
        $resp = $this->subprefeituraRepo->delete($subprefeitura->id);
        $this->assertTrue($resp);
        $this->assertNull(Subprefeitura::find($subprefeitura->id), 'Subprefeitura should not exist in DB');
    }
}
