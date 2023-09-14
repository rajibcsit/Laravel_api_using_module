<?php

namespace Modules\Lesson\Transformers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'title' => $this->title,
            'photo' => $this->getPhoto($this->photo),
        ];
    }

    public function getPhoto($photo)
    {
        if ($photo) {
            return Storage::url($photo);
        }

        return null;
    }
}
