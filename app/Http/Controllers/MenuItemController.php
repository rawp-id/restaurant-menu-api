<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuItemRequest;
use App\Services\MenuItemService;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function __construct(
        protected MenuItemService $service
    ) {}

    public function index($restaurantId, Request $request)
    {
        $filters = [
            'category' => $request->query('category'),
            'search' => $request->query('search'),
        ];

        return response()->json([
            'message' => 'Menu items retrieved successfully',
            'data' => $this->service->list($restaurantId, $filters),
        ]);
    }

    public function store($restaurantId, StoreMenuItemRequest $request)
    {
        $item = $this->service->create(
            $restaurantId,
            $request->validated()
        );

        return response()->json([
            'message' => 'Menu item created successfully',
            'data' => $item,
        ], 201);
    }

    public function update(StoreMenuItemRequest $request, $id)
    {
        return response()->json([
            'message' => 'Menu item updated successfully',
            'data' => $this->service->update($id, $request->validated()),
        ]);
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
