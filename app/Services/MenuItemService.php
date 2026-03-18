<?php

namespace App\Services;

use App\Repositories\MenuItemRepository;
use App\Models\Restaurant;

class MenuItemService
{
    public function __construct(
        protected MenuItemRepository $repo
    ) {}

    public function list($restaurantId, $category = null)
    {
        return $this->repo->paginateByRestaurant($restaurantId, $category);
    }

    public function create($restaurantId, array $data)
    {
        $restaurant = Restaurant::find($restaurantId);

        if (!$restaurant) {
            abort(404, 'Restaurant not found');
        }

        return $this->repo->create([
            ...$data,
            'restaurant_id' => $restaurantId
        ]);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}