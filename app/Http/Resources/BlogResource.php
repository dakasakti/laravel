<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            "id" => $this->id,
            "author" => $this->user->name,
            "title" => $this->title,
            "slug" => $this->slug,
            "image_path" => asset("/storage/images/$this->image_path"),
            "body" => $this->body,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
