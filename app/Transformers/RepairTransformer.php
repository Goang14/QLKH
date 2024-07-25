<?php

namespace App\Transformers;

use App\Models\Repairs;
use League\Fractal\TransformerAbstract;

class RepairTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Repairs $value)
    {
        return [
            "id" => $value->id,
            "customer_id" => $value->customer_id,
            "product_id" => $value->product_id,
            "product_name" => $value->product_name,
            "repair_content" => $value->repair_content,
            "status" => $value->status,
            "start_guarantee" => $value->start_guarantee,
            "end_guarantee" => $value->end_guarantee,
            'name' => $value->customer_name,
            'phone' => $value->phone,
            'email' => $value->email,
            'type' => $value->type,
            'address' => $value->address,
        ];
    }
}
