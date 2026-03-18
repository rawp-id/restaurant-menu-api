<?php

namespace App\Repositories;

use App\Models\MenuItem;

class MenuItemRepository
{
    public function paginateByRestaurant($restaurantId, $filters = [])
    {
        $query = MenuItem::where('restaurant_id', $restaurantId);

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
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
