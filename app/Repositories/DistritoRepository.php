<?php

namespace Proprios\Repositories;

use Proprios\Models\Distrito;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DistritoRepository
 * @package Proprios\Repositories
 * @version January 30, 2018, 4:53 pm UTC
 *
 * @method Distrito findWithoutFail($id, $columns = ['*'])
 * @method Distrito find($id, $columns = ['*'])
 * @method Distrito first($columns = ['*'])
*/
class DistritoRepository extends BaseRepository
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
        return Distrito::class;
    }
}
