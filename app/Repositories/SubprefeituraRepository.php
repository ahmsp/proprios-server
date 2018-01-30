<?php

namespace Proprios\Repositories;

use Proprios\Models\Subprefeitura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubprefeituraRepository
 * @package Proprios\Repositories
 * @version January 30, 2018, 4:56 pm UTC
 *
 * @method Subprefeitura findWithoutFail($id, $columns = ['*'])
 * @method Subprefeitura find($id, $columns = ['*'])
 * @method Subprefeitura first($columns = ['*'])
*/
class SubprefeituraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subprefeitura::class;
    }
}
