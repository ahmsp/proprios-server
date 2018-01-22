<?php

use Faker\Factory as Faker;
use Proprios\Models\Secretaria;
use Proprios\Repositories\SecretariaRepository;

trait MakeSecretariaTrait
{
    /**
     * Create fake instance of Secretaria and save it in database
     *
     * @param array $secretariaFields
     * @return Secretaria
     */
    public function makeSecretaria($secretariaFields = [])
    {
        /** @var SecretariaRepository $secretariaRepo */
        $secretariaRepo = App::make(SecretariaRepository::class);
        $theme = $this->fakeSecretariaData($secretariaFields);
        return $secretariaRepo->create($theme);
    }

    /**
     * Get fake instance of Secretaria
     *
     * @param array $secretariaFields
     * @return Secretaria
     */
    public function fakeSecretaria($secretariaFields = [])
    {
        return new Secretaria($this->fakeSecretariaData($secretariaFields));
    }

    /**
     * Get fake data of Secretaria
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSecretariaData($secretariaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $secretariaFields);
    }
}
