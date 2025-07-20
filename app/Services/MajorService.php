<?php

namespace App\Services;

use App\Repositories\MajorRepository;

class MajorService
{
    private MajorRepository $majorRepository;
    
    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function getAll()
    {
        return $this->majorRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->majorRepository->getById($id);
    }

    public function create(string $name)
    {
        return $this->majorRepository->create($name);
    }

    public function update(int $id, string $name)
    {
        return $this->majorRepository->update($id, $name);
    }

    public function delete(int $id)
    {
        return $this->majorRepository->delete($id);
    }
}
