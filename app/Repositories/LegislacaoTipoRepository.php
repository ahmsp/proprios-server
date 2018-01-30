<?php

namespace Proprios\Repositories;

use Proprios\Models\LegislacaoTipo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LegislacaoTipoRepository
 * @package Proprios\Repositories
 * @version January 30, 2018, 4:54 pm UTC
 *
 * @method LegislacaoTipo findWithoutFail($id, $columns = ['*'])
 * @method LegislacaoTipo find($id, $columns = ['*'])
 * @method LegislacaoTipo first($columns = ['*'])
*/
class LegislacaoTipoRepository extends BaseRepository
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
        return LegislacaoTipo::class;
    }
}
