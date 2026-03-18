<?php

namespace App\Repositories;

use App\Models\MenuItem;

class MenuItemRepository
{
    public function paginateByRestaurant($restaurantId, $category = null)
    {
        $query = MenuItem::where('restaurant_id', $restaurantId);

        if ($category) {
            $query->where('category', $category);
        }

        return $query->paginate(10);
    }

    public function find($id)
    {
        return MenuItem::find($id);
    }

    public function create(array $data)
    {
        return MenuItem::create($data);
    }

    public function update($id, array $data)
    {
        $item = MenuItem::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete($id)
    {
        return MenuItem::destroy($id);
    }
}