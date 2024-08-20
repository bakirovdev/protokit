<?php

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return array_replace_recursive(parent::toArray($request), [
            'profile' => ProfileResource::make($this->whenLoaded('profile')),
        ]);
    }
}
