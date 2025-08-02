<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    private CityRepository $cityRepository;
    
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function getAll()
    {
        return $this->cityRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->cityRepository->getById($id);
    }

    public function create(string $name)
    {
        return $this->cityRepository->create($name);
    }

    public function update(int $id, string $name)
    {
        return $this->cityRepository->update($id, $name);
    }

    public function delete(int $id)
    {
        return $this->cityRepository->delete($id);
    }
}
