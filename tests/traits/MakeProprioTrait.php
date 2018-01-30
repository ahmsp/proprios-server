<?php

use Faker\Factory as Faker;
use Proprios\Models\Proprio;
use Proprios\Repositories\ProprioRepository;

trait MakeProprioTrait
{
    /**
     * Create fake instance of Proprio and save it in database
     *
     * @param array $proprioFields
     * @return Proprio
     */
    public function makeProprio($proprioFields = [])
    {
        /** @var ProprioRepository $proprioRepo */
        $proprioRepo = App::make(ProprioRepository::class);
        $theme = $this->fakeProprioData($proprioFields);
        return $proprioRepo->create($theme);
    }

    /**
     * Get fake instance of Proprio
     *
     * @param array $proprioFields
     * @return Proprio
     */
    public function fakeProprio($proprioFields = [])
    {
        return new Proprio($this->fakeProprioData($proprioFields));
    }

    /**
     * Get fake data of Proprio
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProprioData($proprioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tipo_id' => $fake->randomDigitNotNull,
            'criacao_nome' => $fake->word,
            'criacao_descritivo' => $fake->text,
            'criacao_ato' => $fake->word,
            'criacao_data' => $fake->word,
            'criacao_ato_tipo' => $fake->word,
            'criacao_ato_numero' => $fake->word,
            'legislacao_antecedente' => $fake->word,
            'nome_extenso' => $fake->word,
            'denominacao_descritivo' => $fake->text,
            'legislacao_extenso' => $fake->word,
            'legislacao_tipo_id' => $fake->randomDigitNotNull,
            'legislacao_data' => $fake->word,
            'endereco' => $fake->word,
            'distrito_id' => $fake->randomDigitNotNull,
            'subprefeitura_id' => $fake->randomDigitNotNull,
            'telefone' => $fake->word,
            'secretaria_id' => $fake->randomDigitNotNull,
            'registro_data' => $fake->word,
            'historico' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $proprioFields);
    }
}
