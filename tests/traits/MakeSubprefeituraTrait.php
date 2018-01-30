<?php

use Faker\Factory as Faker;
use Proprios\Models\Subprefeitura;
use Proprios\Repositories\SubprefeituraRepository;

trait MakeSubprefeituraTrait
{
    /**
     * Create fake instance of Subprefeitura and save it in database
     *
     * @param array $subprefeituraFields
     * @return Subprefeitura
     */
    public function makeSubprefeitura($subprefeituraFields = [])
    {
        /** @var SubprefeituraRepository $subprefeituraRepo */
        $subprefeituraRepo = App::make(SubprefeituraRepository::class);
        $theme = $this->fakeSubprefeituraData($subprefeituraFields);
        return $subprefeituraRepo->create($theme);
    }

    /**
     * Get fake instance of Subprefeitura
     *
     * @param array $subprefeituraFields
     * @return Subprefeitura
     */
    public function fakeSubprefeitura($subprefeituraFields = [])
    {
        return new Subprefeitura($this->fakeSubprefeituraData($subprefeituraFields));
    }

    /**
     * Get fake data of Subprefeitura
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSubprefeituraData($subprefeituraFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $subprefeituraFields);
    }
}
