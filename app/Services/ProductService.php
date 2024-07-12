<?php

namespace App\Services;

use App\Models\Suppliers;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class SupplierService
 * @package App\Services
 */
class SupplierService extends BaseService
{
    public function createSupplier($request){
        try {
            $create = $request->all();
            return Suppliers::create($create);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function searchSupplier($request){
        try {
            $params = $request->only('keyword');
            $query = Suppliers::query();
            if (isset($params['keyword'])) {
                $query->where(function($query) use ($params) {
                    $query->where('suppliers.name', 'LIKE', "%{$params['keyword']}%");
                });
            }
            return $query->paginate(5);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
