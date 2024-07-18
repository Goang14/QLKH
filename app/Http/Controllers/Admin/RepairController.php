<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepairRequest;
use App\Models\Services;
use App\Services\RepairService;
use App\Transformers\ProductTransformer;
use App\Transformers\RepairTransformer;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    protected $repairService;
    public function __construct(RepairService $repairService)
    {
        $this->middleware('auth');
        $this->repairService = $repairService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Services::get();
        return view('website.repairs.index', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RepairRequest $request)
    {
        $create = $this->repairService->createRepair($request);
        return responder()->data($create, new RepairTransformer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

       /**
     * search a repair
     * @return data
     */
    public function searchRepair(Request $request){
        $repair = $this->repairService->searchRepair($request);
        return responder()->paginate($repair, new RepairTransformer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
