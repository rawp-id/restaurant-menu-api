<?php

namespace App\Repositories;

use App\Models\Restaurant;

class RestaurantRepository
{
    public function paginate($limit = 10)
    {
        return Restaurant::query()->paginate($limit);
    }

    public function find($id)
    {
        return Restaurant::with('menuItems')->find($id);
    }

    public function create(array $data)
    {
        return Restaurant::create($data);
    }

    public function update($id, array $data)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($data);
        return $restaurant;
    }

    public function delete($id)
    {
        return Restaurant::destroy($id);
    }
}