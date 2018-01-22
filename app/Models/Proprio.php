<?php

namespace Proprios\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proprio
 * @package Proprios\Models
 * @version January 22, 2018, 5:15 pm UTC
 *
 * @property string criacao_nome
 * @property string criacao_descritivo
 * @property string criacao_ato
 * @property date criacao_data
 * @property string criacao_ato_tipo
 * @property string criacao_ato_numero
 * @property string legislacao_antecedente
 * @property string nome_extenso
 * @property string denominacao_descritivo
 * @property string legislacao_extenso
 * @property string legislacao_tipo
 * @property date legislacao_data
 * @property string endereco
 * @property string distrito
 * @property string subprefeitura
 * @property string telefone
 * @property string secretaria
 * @property date registro_data
 * @property string historico
 */
class Proprio extends Model
{
    use SoftDeletes;

    public $table = 'proprio';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'criacao_nome' => 'string',
        'criacao_descritivo' => 'string',
        'criacao_ato' => 'string',
        'criacao_data' => 'date',
        'criacao_ato_tipo' => 'string',
        'criacao_ato_numero' => 'string',
        'legislacao_antecedente' => 'string',
        'nome_extenso' => 'string',
        'denominacao_descritivo' => 'string',
        'legislacao_extenso' => 'string',
        'legislacao_tipo' => 'string',
        'legislacao_data' => 'date',
        'endereco' => 'string',
        'distrito' => 'string',
        'subprefeitura' => 'string',
        'telefone' => 'string',
        'secretaria' => 'string',
        'registro_data' => 'date',
        'historico' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
