<?php

namespace App\Http\Resources;

use App\Http\Resources\User\PermissionCollection;
use App\Http\Resources\User\RoleCollection;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id'          => $this->resource->id,
            'name'        => $this->resource->name,
            'email'       => $this->resource->email,
            'permissions' => new PermissionCollection($this->resource->permissions),
            'roles'       => new RoleCollection($this->resource->roles),
        ];

        if ($request->has('fields')) {
            $fields = explode(',', $request->get('fields'));
            // TODO remove not requested fields from $data
        }

        return $data;
    }
}
