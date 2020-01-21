<?php

namespace App\Repositories;

use App\Models\Produit;
use App\Repositories\BaseRepository;

/**
 * Class ProduitRepository
 * @package App\Repositories
 * @version November 22, 2019, 1:46 pm UTC
*/

class ProduitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomprod',
        'imageprod',
        'prix',
        'quantite',
        'id_cat'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produit::class;
    }
}
