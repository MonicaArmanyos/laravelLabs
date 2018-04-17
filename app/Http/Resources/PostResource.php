<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
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
           
            'title' => $this->title,//dlwa2ty mhma 8ayart fe esm el column hwa malosh da3wa w hayraga3 'title' wana bs h8ayar $this->title  
            'description' => $this->description,
            'user' => new UserResource($this->user)

        ];
    }
}