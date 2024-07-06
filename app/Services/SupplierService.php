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

    public function searchSupplier(){
        try {
            $query = Suppliers::query();
            return $query->paginate(20);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
