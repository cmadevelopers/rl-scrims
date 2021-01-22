<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rl_rank_id' => $this->rl_rank_id,
            'team_id' => $this->team_id,
            'email' => $this->email,
            'name' => $this->name,
            'username' => $this->username,
            'steamid' => $this->steamid,
            'nick' => $this->nick,
            'platform' => $this->platform,
            'rank_status' => $this->rank_status,
            'bio' => $this->bio,
            'picture' => $this->picture,
            'cover' => $this->cover,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
