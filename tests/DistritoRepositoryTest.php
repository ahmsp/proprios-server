<?php

use Proprios\Models\Distrito;
use Proprios\Repositories\DistritoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DistritoRepositoryTest extends TestCase
{
    use MakeDistritoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DistritoRepository
     */
    protected $distritoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->distritoRepo = App::make(DistritoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDistrito()
    {
        $distrito = $this->fakeDistritoData();
        $createdDistrito = $this->distritoRepo->create($distrito);
        $createdDistrito = $createdDistrito->toArray();
        $this->assertArrayHasKey('id', $createdDistrito);
        $this->assertNotNull($createdDistrito['id'], 'Created Distrito must have id specified');
        $this->assertNotNull(Distrito::find($createdDistrito['id']), 'Distrito with given id must be in DB');
        $this->assertModelData($distrito, $createdDistrito);
    }

    /**
     * @test read
     */
    public function testReadDistrito()
    {
        $distrito = $this->makeDistrito();
        $dbDistrito = $this->distritoRepo->find($distrito->id);
        $dbDistrito = $dbDistrito->toArray();
        $this->assertModelData($distrito->toArray(), $dbDistrito);
    }

    /**
     * @test update
     */
    public function testUpdateDistrito()
    {
        $distrito = $this->makeDistrito();
        $fakeDistrito = $this->fakeDistritoData();
        $updatedDistrito = $this->distritoRepo->update($fakeDistrito, $distrito->id);
        $this->assertModelData($fakeDistrito, $updatedDistrito->toArray());
        $dbDistrito = $this->distritoRepo->find($distrito->id);
        $this->assertModelData($fakeDistrito, $dbDistrito->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDistrito()
    {
        $distrito = $this->makeDistrito();
        $resp = $this->distritoRepo->delete($distrito->id);
        $this->assertTrue($resp);
        $this->assertNull(Distrito::find($distrito->id), 'Distrito should not exist in DB');
    }
}
