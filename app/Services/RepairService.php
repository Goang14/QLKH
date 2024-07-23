<?php

namespace App\Services;

use App\Models\Customers;
use App\Models\Repairs;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class RepairService
 * @package App\Services
 */
class RepairService extends BaseService
{
    public function createRepair($request){
        try {
            $create = $request->all();
            $customer = Customers::create([
                "name" => $create['name_customer'],
                "email" => $create['email'],
                "phone" => $create['phone'],
                "address" => $create['address'],
                "type" => $create['type'],
            ]);

            return Repairs::create([
                "customer_id" => $customer->id,
                "product_id" => $create['product_id'],
                "repair_content" => $create['repair_content'],
                "status" => 0,
                "start_guarantee" => $create['start_guarantee'],
                "end_guarantee" => $create['end_guarantee'],
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function searchRepair($request)
    {
        try {
            $params = $request->only('keyword');
            $query = Repairs::leftJoin('customers', 'customers.id', '=', 'repairs.customer_id')
                            ->leftJoin('products', 'products.id', '=', 'repairs.product_id')
                            ->select('repairs.*', 'customers.name as customer_name', 'customers.phone', 'customers.address', 'customers.email', 'customers.type', 'products.name as product_name');
            if (isset($params['keyword'])) {
                $keyword = $params['keyword'];
                $query->where(function ($query) use ($keyword) {
                    $query->where('repairs.name', 'LIKE', "%{$keyword}%")
                        ->orWhere('customers.name', 'LIKE', "%{$keyword}%");
                });
            }

            return $query->paginate(5);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }


    public function updateRepair($request){
        try {
            $data = Repairs::find($request->id_repair)->update([
                'repair_content' => $request->repair_content,
                'start_guarantee' => $request->start_guarantee,
                'end_guarantee' => $request->end_guarantee,
            ]);

            Customers::find($request->id_customer)->update([
                'name' => $request->name_customer,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->type,
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteRepair($id){
        try {
            return Repairs::find($id)->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
