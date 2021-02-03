<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={"password", "email", "name", "username"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="rl_rank_id",
 *          description="rl_rank_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="team_id",
 *          description="team_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="username",
 *          description="username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="steamid",
 *          description="steamid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nick",
 *          description="nick",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="platform",
 *          description="platform",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rank_status",
 *          description="rank_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="bio",
 *          description="bio",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="picture",
 *          description="picture",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cover",
 *          description="cover",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email_verified_at",
 *          description="email_verified_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class User extends \Illuminate\Foundation\Auth\User implements JWTSubject
{ //\Illuminate\Foundation\Auth\User

    use HasFactory;

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules
        = [
            'rl_rank_id'        => 'nullable|integer',
            'team_id'           => 'nullable|integer',
            'password'          => 'required|string|min:8|max:60',
            'email'             => 'required|string|max:255',
            'name'              => 'required|string|max:50',
            'username'          => 'required|string|max:25',
            'steamid'           => 'nullable|string|max:17',
            'nick'              => 'nullable|string|max:25',
            'platform'          => 'nullable|string',
            'rank_status'       => 'nullable|string',
            'bio'               => 'nullable|string|max:255',
            'picture'           => 'nullable|string|max:1024',
            'cover'             => 'nullable|string|max:1024',
            'email_verified_at' => 'nullable',
            'created_at'        => 'nullable',
            'updated_at'        => 'nullable',
        ];
    public $table = 'user';
    public $connection = "mysql";
//    public $hidden = ['password', 'updated_at'];
    public $fillable
        = [
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
            'email_verified_at',
        ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'id'                => 'integer',
            'rl_rank_id'        => 'integer',
            'team_id'           => 'integer',
            'password'          => 'string',
            'email'             => 'string',
            'name'              => 'string',
            'username'          => 'string',
            'steamid'           => 'string',
            'nick'              => 'string',
            'platform'          => 'string',
            'rank_status'       => 'string',
            'bio'               => 'string',
            'picture'           => 'string',
            'cover'             => 'string',
            'email_verified_at' => 'datetime',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rlRank()
    {
        return $this->belongsTo(\App\Models\RlRank::class, 'rl_rank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function contacts()
    {
        return $this->belongsToMany(\App\Models\Contact::class,
            'contact_has_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function organizations()
    {
        return $this->belongsToMany(\App\Models\Organization::class,
            'organization_has_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function team1s()
    {
        return $this->hasMany(\App\Models\Team::class, 'owner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function achievements()
    {
        return $this->belongsToMany(\App\Models\Achievement::class,
            'user_has_achievement');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
