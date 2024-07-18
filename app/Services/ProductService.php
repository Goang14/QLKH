<?php

namespace App\Services;

use App\Models\Products;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends BaseService
{
    public function createProduct($request){
        try {
            $create = $request->all();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('images', $filename, 'public');
                $imageUrl = Storage::url($filepath);
            } else {
                $imageUrl = null;
            }

            return Products::create([
                "name" => $create->name_product,
                "description" => $create->description,
                "price" => $create->price	,
                "quantity" => $create->quantity,
                "supplier_id" => $create->supplier_id,
                "min_quantity" => $create->min_quantity,
                "image_url" => $imageUrl,
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function searchProduct($request){
        try {
            $params = $request->only('keyword');
            $query = Products::query();
            if (isset($params['keyword'])) {
                $query->where(function($query) use ($params) {
                    $query->where('products.name', 'LIKE', "%{$params['keyword']}%");
                });
            }
            return $query->paginate(5);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
