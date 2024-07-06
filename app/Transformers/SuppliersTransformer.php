<?php

namespace App\Transformers;

use App\Models\Suppliers;
use League\Fractal\TransformerAbstract;

class SuppliersTransformer extends TransformerAbstract
{
    /**
     * @param Suppliers $value
     * @return array
     */
    public function transform(Suppliers $value)
    {
        return [
            'name' => $value->name,
            'contact_name' => $value->contact_name,
            'phone' => $value->phone,
            'email' => $value->email,
            'address' => $value->address,
        ];
    }
}
