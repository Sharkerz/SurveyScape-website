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
        $updated_at = $this->updated_at->format('Y-m-d');
        $created_at = $this->created_at->format('Y-m-d');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'open_on' => $this->open_on,
            'close_on' => $this->close_on,
            'updated_at' =>$updated_at,
            'created_at' =>$created_at,
            'image' =>$this->image,
            'owner' => ['name'=>$this->user->name,'id'=>$this->user->id],
        ];
    }
}
