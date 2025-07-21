<?php

namespace App\Repositories;

use App\Models\Major;

class MajorRepository
{
    public function getAll()
    {
        return Major::withCount(['students as total_students'])->orderBy('name')->paginate(5);
    }

    public function getById(int $id)
    {
        return Major::with(['students:nim,name,major_id'])->findOrFail($id);
    }

    public function create(string $name)
    {
        return Major::create([
            'name' => $name
        ]);
    }

    public function update(int $id, string $name)
    {
        $major = Major::findOrFail($id);
        $major->update([
            'name' => $name
        ]);
        return $major;
    }

    public function delete(int $id)
    {
        $major = Major::findOrFail($id);
        $major->delete();
    }

    public function countAll()
    {
        return Major::count();
    }
}
