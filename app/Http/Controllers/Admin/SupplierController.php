<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuppliersRequest;
use App\Services\SupplierService;
use App\Transformers\SuppliersTransformer;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    protected $supplierService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SupplierService $supplierService)
    {
        $this->middleware('auth');
        $this->supplierService = $supplierService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.suppliers.suppliers');
    }

    /**
     * Store a newly created resource in storage.
     * @return Responder
     */

    public function store(SuppliersRequest $request)
    {
        $data = $this->supplierService->createSupplier($request);
        return responder()->data($data, new SuppliersTransformer);
    }

    /**
     * search a supplier
     * @return data
     */
    public function searchSupplier(Request $request){
        $supplier = $this->supplierService->searchSupplier($request);
        return responder()->paginate($supplier, new SuppliersTransformer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateSupplier = $this->supplierService->updateSupplier($request);
        return responder()->updated($updateSupplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->supplierService->deleteSupplier($id);
        return redirect()->route('suppliers');
    }
}
