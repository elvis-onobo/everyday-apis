<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hub extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // public function with($request){
        //     return [
        //         'author' => 'Elvis Onobo',
        //         'email' => 'elvis.onobo@gmail.com'
        //     ];
        // }
    }
}
