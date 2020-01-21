<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class client
 * @package App\Models
 * @version January 21, 2020, 9:06 am UTC
 *
 * @property string name
 * @property string email
 * @property integer telephone
 * @property string adresse
 */
class client extends Model
{

    public $table = 'clients';
    



    public $fillable = [
        'name',
        'email',
        'telephone',
        'adresse'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'telephone' => 'integer',
        'adresse' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
