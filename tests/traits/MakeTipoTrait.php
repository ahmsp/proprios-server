<?php

use Faker\Factory as Faker;
use Proprios\Models\Tipo;
use Proprios\Repositories\TipoRepository;

trait MakeTipoTrait
{
    /**
     * Create fake instance of Tipo and save it in database
     *
     * @param array $tipoFields
     * @return Tipo
     */
    public function makeTipo($tipoFields = [])
    {
        /** @var TipoRepository $tipoRepo */
        $tipoRepo = App::make(TipoRepository::class);
        $theme = $this->fakeTipoData($tipoFields);
        return $tipoRepo->create($theme);
    }

    /**
     * Get fake instance of Tipo
     *
     * @param array $tipoFields
     * @return Tipo
     */
    public function fakeTipo($tipoFields = [])
    {
        return new Tipo($this->fakeTipoData($tipoFields));
    }

    /**
     * Get fake data of Tipo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTipoData($tipoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'sigla' => $fake->word,
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tipoFields);
    }
}
