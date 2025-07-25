<?php

namespace App\Services;

use App\Repositories\StudentRepository;

class StudentService
{
    private StudentRepository $studentRepository;
    
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll(array $fields, ?string $search = null)
    {
        return $this->studentRepository->getAll($fields, $search);
    }

    public function getById(int $id, array $fields)
    {
        return $this->studentRepository->getById($id, $fields);
    }

    public function create(array $fields)
    {
        return $this->studentRepository->create($fields);
    }

    public function update(int $id, array $fields)
    {
        return $this->studentRepository->update($id, $fields);
    }

    public function delete(int $id)
    {
        return $this->studentRepository->delete($id);
    }

    public function countAll()
    {
        return $this->studentRepository->countAll();
    }

    public function countByGender(string $gender)
    {
        return $this->studentRepository->countByGender($gender);
    }
}
