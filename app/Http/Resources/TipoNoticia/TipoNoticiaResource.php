<?php

namespace App\Http\Resources\TipoNoticia;

use Illuminate\Http\Resources\Json\JsonResource;

class TipoNoticiaResource extends JsonResource
{
    public function toArray($request)
    {
        $salida = [
            'type' => 'tipoNoticia',
            'attributes' => [
                'codigo' => $this['id'],
                'descripcion' => $this['tipo']
            ]
        ];
        return $salida;
    }
}
