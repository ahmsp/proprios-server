<?php

namespace Proprios\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proprio
 * @package Proprios\Models
 * @version January 30, 2018, 4:58 pm UTC
 *
 * @property \Proprios\Models\Distrito distrito
 * @property \Proprios\Models\LegislacaoTipo legislacaoTipo
 * @property \Proprios\Models\Secretarium secretarium
 * @property \Proprios\Models\Subprefeitura subprefeitura
 * @property \Proprios\Models\Tipo tipo
 * @property integer tipo_id
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
 * @property integer legislacao_tipo_id
 * @property date legislacao_data
 * @property string endereco
 * @property integer distrito_id
 * @property integer subprefeitura_id
 * @property string telefone
 * @property integer secretaria_id
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo_id' => 'integer',
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
        'legislacao_tipo_id' => 'integer',
        'legislacao_data' => 'date',
        'endereco' => 'string',
        'distrito_id' => 'integer',
        'subprefeitura_id' => 'integer',
        'telefone' => 'string',
        'secretaria_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function distrito()
    {
        return $this->belongsTo(\Proprios\Models\Distrito::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function legislacaoTipo()
    {
        return $this->belongsTo(\Proprios\Models\LegislacaoTipo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function secretarium()
    {
        return $this->belongsTo(\Proprios\Models\Secretarium::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subprefeitura()
    {
        return $this->belongsTo(\Proprios\Models\Subprefeitura::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipo()
    {
        return $this->belongsTo(\Proprios\Models\Tipo::class);
    }
}
