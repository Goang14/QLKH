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
                "name" => $create['name_product'],
                "description" => $create['description'],
                "price" => $create['price'],
                "quantity" => $create['quantity'],
                "supplier_id" => $create['supplier_id'],
                "image_url" => $imageUrl ?? null,
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function searchProduct($request){
        try {
            $params = $request->only('keyword');
            $query = Products::query()->join('suppliers', 'suppliers.id', 'products.supplier_id')->select('products.*', 'suppliers.name as supplier_name');
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

    public function updateProduct($request){
        try {
            return Products::find($request->id_product)->update([
                'name' => $request->name_product,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'supplier_id' => $request->supplier_id
            ]);
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteProduct($id){
        try {
            return Products::find($id)->delete();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

}
