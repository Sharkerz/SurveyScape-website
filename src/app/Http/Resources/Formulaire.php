<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Formulaire extends JsonResource
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
            'name' => $this->name,
            'open_on' => $this->open_on,
            'close_on' => $this->close_on,
            'image' =>$this->image,
            'owner' => ['name'=>$this->user->name,'id'=>$this->user->id],
        ];
    }
}
