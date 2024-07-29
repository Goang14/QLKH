<?php

namespace App\Services;

use App\Models\Customers;
use App\Models\Pawns;
use App\Models\Sells;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class PawnService
 * @package App\Services
 */
class PawnService extends BaseService
{
    public function createPawn($request){
        try {
            DB::beginTransaction();
            $customer = Customers::create([
                "name" => $request->name_customer,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "type" => 3,
            ]);

            $pawn = Pawns::create([
                "customer_id" => $customer->id,
                "content" => $request->content,
                "money_pawn" => $request->money_pawn,
                "status" => 0,
                "start_guarantee" => $request->start_guarantee,
                "end_guarantee" => $request->end_guarantee,
            ]);
            DB::commit();
            return $pawn;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function searchPawn($request)
    {
        try {
            $params = $request->only('keyword');
            $data = Pawns::all();

            foreach ($data as $value) {
                if($value->end_guarantee < Carbon::now()){
                    $value->status = 1;
                    $value->save();
                }
            }

            $query = Pawns::leftJoin('customers', 'customers.id', '=', 'pawns.customer_id')
                            ->select('pawns.*', 'customers.name as customer_name', 'customers.phone', 'customers.address',
                             'customers.email', 'customers.type');

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

    public function updatePawn($request){
        try {
            DB::beginTransaction();
            Pawns::find($request->id_pawn)->update([
                'content' => $request->content,
                'money_pawn' => $request->money_pawn,
                'start_guarantee' => $request->start_guarantee,
                'end_guarantee' => $request->end_guarantee,
            ]);

            Customers::find($request->id_customer)->update([
                'name' => $request->name_customer,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => 3,
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    public function deletePawn($id){
        try {
            $sell = Pawns::find($id);
            Customers::find($sell->customer_id)->delete();
            return $sell->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
