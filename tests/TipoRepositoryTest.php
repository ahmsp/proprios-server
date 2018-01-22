<?php

use Proprios\Models\Tipo;
use Proprios\Repositories\TipoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TipoRepositoryTest extends TestCase
{
    use MakeTipoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TipoRepository
     */
    protected $tipoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tipoRepo = App::make(TipoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTipo()
    {
        $tipo = $this->fakeTipoData();
        $createdTipo = $this->tipoRepo->create($tipo);
        $createdTipo = $createdTipo->toArray();
        $this->assertArrayHasKey('id', $createdTipo);
        $this->assertNotNull($createdTipo['id'], 'Created Tipo must have id specified');
        $this->assertNotNull(Tipo::find($createdTipo['id']), 'Tipo with given id must be in DB');
        $this->assertModelData($tipo, $createdTipo);
    }

    /**
     * @test read
     */
    public function testReadTipo()
    {
        $tipo = $this->makeTipo();
        $dbTipo = $this->tipoRepo->find($tipo->id);
        $dbTipo = $dbTipo->toArray();
        $this->assertModelData($tipo->toArray(), $dbTipo);
    }

    /**
     * @test update
     */
    public function testUpdateTipo()
    {
        $tipo = $this->makeTipo();
        $fakeTipo = $this->fakeTipoData();
        $updatedTipo = $this->tipoRepo->update($fakeTipo, $tipo->id);
        $this->assertModelData($fakeTipo, $updatedTipo->toArray());
        $dbTipo = $this->tipoRepo->find($tipo->id);
        $this->assertModelData($fakeTipo, $dbTipo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTipo()
    {
        $tipo = $this->makeTipo();
        $resp = $this->tipoRepo->delete($tipo->id);
        $this->assertTrue($resp);
        $this->assertNull(Tipo::find($tipo->id), 'Tipo should not exist in DB');
    }
}
