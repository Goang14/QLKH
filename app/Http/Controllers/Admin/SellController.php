<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairRequest;
use App\Http\Requests\SellRequest;
use App\Models\Products;
use App\Models\Services;
use App\Services\RepairService;
use App\Services\SellService;
use App\Transformers\RepairTransformer;
use App\Transformers\SellTransformer;
use Illuminate\Http\Request;

class SellController extends Controller
{
    protected $sellService;
    public function __construct(SellService $sellService)
    {
        $this->middleware('auth');
        $this->sellService = $sellService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Products::get();
        return view('website.sells.index', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SellRequest $request)
    {
        $create = $this->sellService->createSell($request);
        return responder()->data($create, new SellTransformer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

       /**
     * search a sell
     * @return data
     */
    public function searchSell(Request $request){
        $sell = $this->sellService->searchSell($request);
        return responder()->paginate($sell, new SellTransformer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updateSell = $this->sellService->updateSell($request);
        return responder()->updated($updateSell);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->sellService->deleteSell($id);
        return redirect()->route('sells');
    }
}
