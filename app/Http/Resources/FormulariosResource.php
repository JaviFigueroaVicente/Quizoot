<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class FormulariosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //if no resize image
        try {
            $resized_image = $this->getMedia('*');
        } catch (Exception $e) {
            $resized_image="";
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'preguntas_count' => $this->preguntas_count,
            'original_image' => $this->media->isNotEmpty() ? $this->media[0]->original_url : null,
            'resized_image' => $this->getFirstMediaUrl('formularios', 'resized-image') ?: null,
            'created_at' => $this->created_at->toDateString()
        ];
    }

}
