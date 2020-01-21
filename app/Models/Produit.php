<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Produit
 * @package App\Models
 * @version November 22, 2019, 1:46 pm UTC
 *
 * @property string nomprod
 * @property string imageprod
 * @property string prix
 * @property string quantite
 * @property integer id_cat
 */
class Produit extends Model
{

    public $table = 'produits';
    



    public $fillable = [
        'nomprod',
        'imageprod',
        'prix',
        'quantite',
        'id_cat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomprod' => 'string',
        'imageprod' => 'string',
        'prix' => 'string',
        'quantite' => 'string',
        'id_cat' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
