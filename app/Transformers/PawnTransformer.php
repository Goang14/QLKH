<?php

namespace App\Transformers;

use App\Models\Pawns;
use League\Fractal\TransformerAbstract;

class PawnTransformer extends TransformerAbstract
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
    public function transform(Pawns $value)
    {
        return [
            "id" => $value->id,
            "customer_id" => $value->customer_id,
            "content" => $value->content,
            "status" => $value->status,
            "money_pawn" => $value->money_pawn,
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
