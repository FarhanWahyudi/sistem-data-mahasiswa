<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    public function getAll(array $fields)
    {
        return Student::select($fields)->with(['majors:name,student_id'])->orderBy('name')->paginate(5);
    }

    public function getById(int $id, array $fields)
    {
        return Student::select($fields)->with(['majors:name,student_id'])->orderBy('name')->findOrFail($id);
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
}
