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
            'legislacao_tipo' => $fake->word,
            'legislacao_data' => $fake->word,
            'endereco' => $fake->word,
            'distrito' => $fake->word,
            'subprefeitura' => $fake->word,
            'telefone' => $fake->word,
            'secretaria' => $fake->word,
            'registro_data' => $fake->word,
            'historico' => $fake->text
        ], $proprioFields);
    }
}
