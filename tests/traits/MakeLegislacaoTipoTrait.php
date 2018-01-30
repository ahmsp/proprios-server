<?php

use Faker\Factory as Faker;
use Proprios\Models\LegislacaoTipo;
use Proprios\Repositories\LegislacaoTipoRepository;

trait MakeLegislacaoTipoTrait
{
    /**
     * Create fake instance of LegislacaoTipo and save it in database
     *
     * @param array $legislacaoTipoFields
     * @return LegislacaoTipo
     */
    public function makeLegislacaoTipo($legislacaoTipoFields = [])
    {
        /** @var LegislacaoTipoRepository $legislacaoTipoRepo */
        $legislacaoTipoRepo = App::make(LegislacaoTipoRepository::class);
        $theme = $this->fakeLegislacaoTipoData($legislacaoTipoFields);
        return $legislacaoTipoRepo->create($theme);
    }

    /**
     * Get fake instance of LegislacaoTipo
     *
     * @param array $legislacaoTipoFields
     * @return LegislacaoTipo
     */
    public function fakeLegislacaoTipo($legislacaoTipoFields = [])
    {
        return new LegislacaoTipo($this->fakeLegislacaoTipoData($legislacaoTipoFields));
    }

    /**
     * Get fake data of LegislacaoTipo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLegislacaoTipoData($legislacaoTipoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $legislacaoTipoFields);
    }
}
