<?php

namespace App\Services;

use App\Models\Customers;
use App\Models\Sells;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class SellService
 * @package App\Services
 */
class SellService extends BaseService
{
    public function createSell($request){
        try {
            DB::beginTransaction();
            $customer = Customers::create([
                "name" => $request->name_customer,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "type" => 2,
            ]);

            $sell = Sells::create([
                "customer_id" => $customer->id,
                "product_id" => $request->product_id,
                "content" => $request->content,
                "status" => 0,
                "start_guarantee" => $request->start_guarantee,
                "end_guarantee" => $request->end_guarantee,
            ]);
            DB::commit();
            return $sell;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function searchSell($request)
    {
        try {
            $params = $request->only('keyword', 'service_search');
            $data = Sells::all();

            foreach ($data as $value) {
                if($value->end_guarantee < Carbon::now()){
                    $value->status = 1;
                    $value->save();
                }
            }

            $query = Sells::leftJoin('customers', 'customers.id', '=', 'sells.customer_id')
                            ->join('products', 'products.id', '=', 'sells.product_id')
                            ->select('sells.*', 'customers.name as customer_name', 'customers.phone', 'customers.address',
                             'customers.email', 'customers.type', 'products.name as product_name', 'products.price',
                            'products.id as product_id');

            if (isset($params['keyword'])) {
                $keyword = $params['keyword'];
                $query->where(function ($query) use ($keyword) {
                    $query->where('customers.name', 'LIKE', "%{$keyword}%")
                        ->orWhere('customers.phone', 'LIKE', "%{$keyword}%");
                });
            }
            return $query->paginate(10);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function updateSell($request){
        try {
            DB::beginTransaction();
            Sells::find($request->id_sell)->update([
                'content' => $request->content,
                'product_id' => $request->product_id,
                'start_guarantee' => $request->start_guarantee,
                'end_guarantee' => $request->end_guarantee,
            ]);

            Customers::find($request->id_customer)->update([
                'name' => $request->name_customer,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => 2,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function deleteSell($id){
        try {
            $sell = Sells::find($id);
            Customers::find($sell->customer_id)->delete();
            return $sell->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
