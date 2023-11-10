<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'theme' => $this->theme,
            'description' => $this->description,
            'listen_order' => $this->whenPivotLoaded('plans_lectures', function () {
                return $this->pivot->listen_order;
            }),
            'groups_listened' => GroupResource::collection($this->whenLoaded('groups')),
            'students_listened' => StudentResource::collection($this->whenLoaded('students')),
        ];
    }
}
