<?php

use Proprios\Models\Proprio;
use Proprios\Repositories\ProprioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProprioRepositoryTest extends TestCase
{
    use MakeProprioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProprioRepository
     */
    protected $proprioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->proprioRepo = App::make(ProprioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProprio()
    {
        $proprio = $this->fakeProprioData();
        $createdProprio = $this->proprioRepo->create($proprio);
        $createdProprio = $createdProprio->toArray();
        $this->assertArrayHasKey('id', $createdProprio);
        $this->assertNotNull($createdProprio['id'], 'Created Proprio must have id specified');
        $this->assertNotNull(Proprio::find($createdProprio['id']), 'Proprio with given id must be in DB');
        $this->assertModelData($proprio, $createdProprio);
    }

    /**
     * @test read
     */
    public function testReadProprio()
    {
        $proprio = $this->makeProprio();
        $dbProprio = $this->proprioRepo->find($proprio->id);
        $dbProprio = $dbProprio->toArray();
        $this->assertModelData($proprio->toArray(), $dbProprio);
    }

    /**
     * @test update
     */
    public function testUpdateProprio()
    {
        $proprio = $this->makeProprio();
        $fakeProprio = $this->fakeProprioData();
        $updatedProprio = $this->proprioRepo->update($fakeProprio, $proprio->id);
        $this->assertModelData($fakeProprio, $updatedProprio->toArray());
        $dbProprio = $this->proprioRepo->find($proprio->id);
        $this->assertModelData($fakeProprio, $dbProprio->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProprio()
    {
        $proprio = $this->makeProprio();
        $resp = $this->proprioRepo->delete($proprio->id);
        $this->assertTrue($resp);
        $this->assertNull(Proprio::find($proprio->id), 'Proprio should not exist in DB');
    }
}
