<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersR extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'nama' => $this->nama,
            'role' => $this->role,
            'created_at' => date_format($this->created_at,'d-m-Y H:i:s')
           ];
    }
}
