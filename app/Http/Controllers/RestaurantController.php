<?php

namespace App\Http\Controllers;

use App\Services\RestaurantService;
use App\Http\Requests\StoreRestaurantRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct(
        protected RestaurantService $service
    ) {}

    public function index()
    {
        return response()->json([
            'data' => $this->service->list()
        ]);
    }

    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = $this->service->create($request->validated());

        return response()->json([
            'data' => $restaurant
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'data' => $this->service->detail($id)
        ]);
    }

    public function update(StoreRestaurantRequest $request, $id)
    {
        return response()->json([
            'data' => $this->service->update($id, $request->validated())
        ]);
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}