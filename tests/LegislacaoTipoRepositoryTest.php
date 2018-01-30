<?php

use Proprios\Models\LegislacaoTipo;
use Proprios\Repositories\LegislacaoTipoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LegislacaoTipoRepositoryTest extends TestCase
{
    use MakeLegislacaoTipoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LegislacaoTipoRepository
     */
    protected $legislacaoTipoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->legislacaoTipoRepo = App::make(LegislacaoTipoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLegislacaoTipo()
    {
        $legislacaoTipo = $this->fakeLegislacaoTipoData();
        $createdLegislacaoTipo = $this->legislacaoTipoRepo->create($legislacaoTipo);
        $createdLegislacaoTipo = $createdLegislacaoTipo->toArray();
        $this->assertArrayHasKey('id', $createdLegislacaoTipo);
        $this->assertNotNull($createdLegislacaoTipo['id'], 'Created LegislacaoTipo must have id specified');
        $this->assertNotNull(LegislacaoTipo::find($createdLegislacaoTipo['id']), 'LegislacaoTipo with given id must be in DB');
        $this->assertModelData($legislacaoTipo, $createdLegislacaoTipo);
    }

    /**
     * @test read
     */
    public function testReadLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $dbLegislacaoTipo = $this->legislacaoTipoRepo->find($legislacaoTipo->id);
        $dbLegislacaoTipo = $dbLegislacaoTipo->toArray();
        $this->assertModelData($legislacaoTipo->toArray(), $dbLegislacaoTipo);
    }

    /**
     * @test update
     */
    public function testUpdateLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $fakeLegislacaoTipo = $this->fakeLegislacaoTipoData();
        $updatedLegislacaoTipo = $this->legislacaoTipoRepo->update($fakeLegislacaoTipo, $legislacaoTipo->id);
        $this->assertModelData($fakeLegislacaoTipo, $updatedLegislacaoTipo->toArray());
        $dbLegislacaoTipo = $this->legislacaoTipoRepo->find($legislacaoTipo->id);
        $this->assertModelData($fakeLegislacaoTipo, $dbLegislacaoTipo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLegislacaoTipo()
    {
        $legislacaoTipo = $this->makeLegislacaoTipo();
        $resp = $this->legislacaoTipoRepo->delete($legislacaoTipo->id);
        $this->assertTrue($resp);
        $this->assertNull(LegislacaoTipo::find($legislacaoTipo->id), 'LegislacaoTipo should not exist in DB');
    }
}
