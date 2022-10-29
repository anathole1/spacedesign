<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDevResource extends JsonResource
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
            'Devname'=>$this->name,
            // 'image'=>asset('/storage/'.$this->image),
            'created_at'=>date_format($this->created_at,'d-m-Y h:i:s a')
         ];
    }
}
