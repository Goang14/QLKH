<?php

namespace App\Transformers;
use App\Models\Products;

use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
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
    public function transform(Products $products)
    {
        return [
            'id' => $products->id,
            "name" => $products->name,
            "description" => $products->description,
            "price" => $products->price	,
            "quantity" => $products->quantity,
            "supplier_id" => $products->supplier_id,
            "min_quantity" => $products->min_quantity,
            "supplier_name" => $products->supplier_name,
            "image_url" => $products->image_url,
        ];
    }
}
