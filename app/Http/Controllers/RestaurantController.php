<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRequest;
use App\Services\RestaurantService;

class RestaurantController extends Controller
{
    public function __construct(
        protected RestaurantService $service
    ) {}

    public function index()
    {
        return $this->paginated(
            $this->service->list(),
            'Restaurants retrieved successfully'
        );
    }

    public function store(StoreRestaurantRequest $request)
    {
        $restaurant = $this->service->create($request->validated());

        return $this->success(
            $restaurant,
            'Restaurant created successfully',
            201
        );
    }

    public function show(int $id)
    {
        $restaurant = $this->service->detail($id);

        if (!$restaurant) {
            return $this->error('Restaurant not found', null, 404);
        }

        return $this->success(
            $restaurant,
            'Restaurant retrieved successfully'
        );
    }

    public function update(StoreRestaurantRequest $request, int $id)
    {
        return $this->success(
            $this->service->update($id, $request->validated()),
            'Restaurant updated successfully'
        );
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return $this->success(
            null,
            'Restaurant deleted successfully'
        );
    }
}
