<?php

namespace Proprios\Repositories;

use Proprios\Models\Proprio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProprioRepository
 * @package Proprios\Repositories
 * @version January 30, 2018, 4:58 pm UTC
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
        'tipo_id',
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
        'legislacao_tipo_id',
        'legislacao_data',
        'endereco',
        'distrito_id',
        'subprefeitura_id',
        'telefone',
        'secretaria_id',
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
