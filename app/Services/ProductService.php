<?php

namespace App\Services;

use App\Models\Products;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductService
 * @package App\Services
 */
class ProductService extends BaseService
{
    public function createProduct($request){
        try {
            $create = $request->all();
            return Products::create($create);
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
