<?php

namespace Proprios\Repositories;

use Proprios\Models\Tipo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TipoRepository
 * @package Proprios\Repositories
 * @version January 22, 2018, 6:22 pm UTC
 *
 * @method Tipo findWithoutFail($id, $columns = ['*'])
 * @method Tipo find($id, $columns = ['*'])
 * @method Tipo first($columns = ['*'])
*/
class TipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sigla',
        'nome'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tipo::class;
    }
}
