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
                            ->select('repairs.*', 'customers.name as customer_name', 'customers.phone', 'customers.address');

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
            return Repairs::find($request->id)->update([
                'id' => $request->id,
                'name' => $request->name,
                'contact_name' => $request->contact_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
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
