<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PawnRequest;
use App\Http\Requests\SellRequest;
use App\Models\Products;
use App\Services\PawnService;
use App\Transformers\PawnTransformer;
use App\Transformers\SellTransformer;
use Illuminate\Http\Request;

class PawnController extends Controller
{
    protected $pawnService;
    public function __construct(PawnService $pawnService)
    {
        $this->middleware('auth');
        $this->pawnService = $pawnService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.pawns.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PawnRequest $request)
    {
        $create = $this->pawnService->createPawn($request);
        return responder()->data($create, new PawnTransformer);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

       /**
     * search a pawns
     * @return data
     */
    public function searchPawn(Request $request){
        $pawns = $this->pawnService->searchPawn($request);
        return responder()->paginate($pawns, new PawnTransformer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updatePawn = $this->pawnService->updatePawn($request);
        return responder()->updated($updatePawn);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pawnService->deletePawn($id);
        return redirect()->route('pawns');
    }
}
