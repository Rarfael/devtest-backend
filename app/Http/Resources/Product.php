<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'data' => ['id' => $this->id,
            'product_name' => $this->product_name,
            'product_type' => $this->product_type,
            'product_description' => $this->product_description,],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
