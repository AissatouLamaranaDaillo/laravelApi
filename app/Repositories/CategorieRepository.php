<?php

namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\BaseRepository;

/**
 * Class CategorieRepository
 * @package App\Repositories
 * @version November 22, 2019, 1:44 pm UTC
*/

class CategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomcat',
        'imagecat',
        'description'
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
        return Categorie::class;
    }
}
