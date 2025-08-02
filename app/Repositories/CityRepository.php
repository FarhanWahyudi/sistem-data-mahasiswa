<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    public function getAll()
    {
        return City::select('*')->withCount(['students as total_students'])->orderBy('name')->get();
    }

    public function getById(int $id)
    {
        return City::with(['students:nim,name,city_id'])->findOrFail($id);
    }

    public function create(string $name)
    {
        return City::create([
            'name' => $name
        ]);
    }

    public function update(int $id, string $name)
    {
        $city = City::findOrFail($id);
        $city->update([
            'name' => $name
        ]);
        return $city;
    }

    public function delete(int $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
    }
}
