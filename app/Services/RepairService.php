<?php

namespace App\Services;

use App\Models\Customers;
use App\Models\Products;
use App\Models\Repairs;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class RepairService
 * @package App\Services
 */
class RepairService extends BaseService
{
    public function createRepair($request){
        try {
            DB::beginTransaction();

            $create = $request->all();
            $customer = Customers::create([
                "name" => $create['name_customer'],
                "email" => $create['email'],
                "phone" => $create['phone'],
                "address" => $create['address'],
                "type" => $create['type'],
            ]);

            $product = Products::find($request->product_id);
            if(isset($product) && !empty($product)){
                $product->quantity = $product->quantity - 1;
                $product->save();
                $money = $product->price;
            }

            $repair = Repairs::create([
                "customer_id" => $customer->id,
                "product_id" => $request->product_id,
                "repair_content" => $create['repair_content'],
                "money" => $money ?? ($request->money_pawn ? $request->money_pawn : ''),
                "status" => 0,
                "start_guarantee" => $create['start_guarantee'],
                "end_guarantee" => $create['end_guarantee'],
            ]);

            if($customer->type == 1 || $customer->type == 3){
                $this->transition(null, $repair->id, $customer->type, 0);
            }else if($customer->type == 2){
                $this->transition($product->id, $repair->id, $customer->type, $product->price);
            }else{
                $this->transition(null, $repair->id, $customer->type, $request->money_pawn);
            }

            DB::commit();
            return $repair;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function searchRepair($request)
    {
        try {
            $params = $request->only('keyword', 'service_search');
            $data = Repairs::all();

            foreach ($data as $value) {
                if($value->end_guarantee < Carbon::now()){
                    $value->status = 1;
                    $value->save();
                }
            }

            $query = Repairs::leftJoin('customers', 'customers.id', '=', 'repairs.customer_id')
                            ->leftJoin('products', 'products.id', '=', 'repairs.product_id')
                            ->select('repairs.*', 'customers.name as customer_name', 'customers.phone', 'customers.address', 'customers.email', 'customers.type', 'products.name as product_name');

            if (isset($params['keyword'])) {
                $keyword = $params['keyword'];
                $query->where(function ($query) use ($keyword) {
                    $query->where('customers.name', 'LIKE', "%{$keyword}%")
                        ->orWhere('customers.phone', 'LIKE', "%{$keyword}%");
                });
            }

            if (isset($params['service_search'])){
                $service_search = $params['service_search'];
                $query->where(function ($query) use ($service_search) {
                    $query->where('customers.type', $service_search);
                });
            }

            return $query->paginate(10);
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
            $repair = Repairs::find($id);
            Customers::find($repair->customer_id)->delete();
            return $repair->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
