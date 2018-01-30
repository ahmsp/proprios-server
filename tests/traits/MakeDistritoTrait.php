<?php

use Faker\Factory as Faker;
use Proprios\Models\Distrito;
use Proprios\Repositories\DistritoRepository;

trait MakeDistritoTrait
{
    /**
     * Create fake instance of Distrito and save it in database
     *
     * @param array $distritoFields
     * @return Distrito
     */
    public function makeDistrito($distritoFields = [])
    {
        /** @var DistritoRepository $distritoRepo */
        $distritoRepo = App::make(DistritoRepository::class);
        $theme = $this->fakeDistritoData($distritoFields);
        return $distritoRepo->create($theme);
    }

    /**
     * Get fake instance of Distrito
     *
     * @param array $distritoFields
     * @return Distrito
     */
    public function fakeDistrito($distritoFields = [])
    {
        return new Distrito($this->fakeDistritoData($distritoFields));
    }

    /**
     * Get fake data of Distrito
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDistritoData($distritoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $distritoFields);
    }
}
