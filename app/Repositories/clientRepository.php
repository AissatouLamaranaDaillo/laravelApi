<?php

namespace App\Repositories;

use App\Models\client;
use App\Repositories\BaseRepository;

/**
 * Class clientRepository
 * @package App\Repositories
 * @version January 21, 2020, 9:06 am UTC
*/

class clientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'telephone',
        'adresse'
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
        return client::class;
    }
}
