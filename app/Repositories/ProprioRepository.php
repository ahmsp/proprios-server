<?php

namespace Proprios\Repositories;

use Proprios\Models\Proprio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProprioRepository
 * @package Proprios\Repositories
 * @version January 22, 2018, 5:15 pm UTC
 *
 * @method Proprio findWithoutFail($id, $columns = ['*'])
 * @method Proprio find($id, $columns = ['*'])
 * @method Proprio first($columns = ['*'])
*/
class ProprioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'criacao_nome',
        'criacao_descritivo',
        'criacao_ato',
        'criacao_data',
        'criacao_ato_tipo',
        'criacao_ato_numero',
        'legislacao_antecedente',
        'nome_extenso',
        'denominacao_descritivo',
        'legislacao_extenso',
        'legislacao_tipo',
        'legislacao_data',
        'endereco',
        'distrito',
        'subprefeitura',
        'telefone',
        'secretaria',
        'registro_data',
        'historico'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proprio::class;
    }
}
