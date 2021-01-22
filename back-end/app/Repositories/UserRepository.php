<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version January 22, 2021, 5:55 pm UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rl_rank_id',
        'team_id',
        'password',
        'email',
        'name',
        'username',
        'steamid',
        'nick',
        'platform',
        'rank_status',
        'bio',
        'picture',
        'cover',
        'email_verified_at'
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
        return User::class;
    }
}
