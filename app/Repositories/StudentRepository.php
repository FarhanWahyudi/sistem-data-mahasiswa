<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    public function getAll(array $fields, ?string $search = null)
    {
        // return Student::select($fields)->with(['major:id,name'])->orderBy('name')->paginate(5);

        $query = Student::select($fields)->with(['major:id,name']);

        if ($search) {
            $query->where('name', 'like', "%$search%")
                 ->orWhere('nim', 'like', "%$search%");
        }

        return $query->orderBy('name')->paginate(5)->withQueryString();
    }

    public function getById(int $id, array $fields)
    {
        return Student::select($fields)->with(['major:id,name'])->orderBy('name')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update(int $id, array $data)
    {
        $student = Student::findOrFail($id);
        $student->update($data);
        return $student;
    }

    public function delete(int $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }

    public function countAll()
    {
        return Student::count();
    }

    public function countByGender(string $gender)
    {
        return Student::where('gender', $gender)->count();
    }
}
