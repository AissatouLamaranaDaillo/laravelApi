<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Categorie
 * @package App\Models
 * @version November 22, 2019, 1:44 pm UTC
 *
 * @property string nomcat
 * @property string imagecat
 * @property string description
 */
class Categorie extends Model
{

    public $table = 'categories';
    



    public $fillable = [
        'nomcat',
        'imagecat',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomcat' => 'string',
        'imagecat' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
