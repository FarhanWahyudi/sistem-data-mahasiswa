<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\Student;
use App\Services\CityService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CityController extends Controller
{
    private CityService $cityService;

    public function __construct(CityService $cityService) {
        $this->cityService = $cityService;
    }

    public function index()
    {
        $cities = $this->cityService->getAll();

        return view('admin.kota', [
            'cities' => $cities
        ]);
    }

    public function show(int $id)
    {
        $major = $this->cityService->getById($id);;
        return response()->json($major);
    }

    public function store(CityRequest $request)
    {
        $city = Str::title($request->validated()['city']);
        $this->cityService->create($city);

        toastr()->closeButton(true)->success('Data berhasil ditambahkan.');
        return response()->json(['message' => 'Jurusan berhasil ditambahkan.']);
    }

    public function update(CityRequest $request, int $id)
    {
        $major = Str::title($request->validated()['city']);

        try {
            $this->cityService->update($id, $major);
            toastr()->closeButton(true)->success('Data berhasil diperbarui.');
            return response()->json(['message' => 'Data berhasil diperbarui.']);
        } catch (ModelNotFoundException $e) {
            toastr()->closeButton(true)->danger('Data gagal diperbarui.');
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->cityService->delete($id);
            toastr()->closeButton(true)->success('Data berhasil dihapus.');
            return redirect()->route('city.view');
        } catch (ModelNotFoundException $e){
            toastr()->closeButton(true)->success('Data gagal dihapus.');
            return redirect()->route('city.view')->with('error', 'Data tidak ditemukan');
        }
    }

    public function students($id)
    {
        $students = Student::where('city_id', $id)->get();
        $city = $this->cityService->getById($id);

        return response()->json([
            'city' => $city,
            'students' => $students,
        ]);
    }
}
