<?php

namespace App\Services;

use App\Repositories\RestaurantRepository;

class RestaurantService
{
    public function __construct(
        protected RestaurantRepository $repo
    ) {}

    public function list()
    {
        return $this->repo->paginate();
    }

    public function detail($id)
    {
        $restaurant = $this->repo->find($id);

        if (!$restaurant) {
            abort(404, 'Restaurant not found');
        }

        return $restaurant;
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
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