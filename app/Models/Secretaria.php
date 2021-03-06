<?php

namespace Proprios\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Secretaria
 * @package Proprios\Models
 * @version January 30, 2018, 4:55 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Proprio
 * @property string nome
 */
class Secretaria extends Model
{
    use SoftDeletes;

    public $table = 'secretaria';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function proprios()
    {
        return $this->hasMany(\Proprios\Models\Proprio::class);
    }
}
