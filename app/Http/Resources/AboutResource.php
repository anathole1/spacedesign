<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'title'=>$this->title,
            'position'=>$this->position,
            'content'=>$this->content,
            'accreditation'=>$this->accreditation,
            'image'=>asset('/storage/'.$this->image)
            
         ];
    }
}
