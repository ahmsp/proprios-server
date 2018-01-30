<?php

namespace Proprios\Repositories;

use Proprios\Models\Secretaria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SecretariaRepository
 * @package Proprios\Repositories
 * @version January 30, 2018, 4:55 pm UTC
 *
 * @method Secretaria findWithoutFail($id, $columns = ['*'])
 * @method Secretaria find($id, $columns = ['*'])
 * @method Secretaria first($columns = ['*'])
*/
class SecretariaRepository extends BaseRepository
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
        return Secretaria::class;
    }
}
