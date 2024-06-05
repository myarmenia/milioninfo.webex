<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeblinkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "id"=>$this->id,
          "organization_id"=>$this->organization_id,
          "weblink"=>$this->weblink=="null" ?null:$this->weblink,
        ];
    }
}
