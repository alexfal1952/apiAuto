<?php

namespace App\Http\Resources\TipoNoticia;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TipoNoticiasResource extends ResourceCollection
{
    public function toArray($request)
    {
       /*  return parent::toArray($request); */
        return TipoNoticiaResource::collection($this->collection->unique('id')->values());
    }
}
