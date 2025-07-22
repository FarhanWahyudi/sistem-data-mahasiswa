<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorRequest;
use App\Models\Major;
use App\Models\Student;
use App\Services\MajorService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    private MajorService $majorService;

    public function __construct(MajorService $majorService) {
        $this->majorService = $majorService;
    }

    public function index()
    {
        $majors = $this->majorService->getAll();

        return view('admin.jurusan', [
            'majors' => $majors
        ]);
    }

    public function show(int $id)
    {
        $major = $this->majorService->getById($id);;
        return response()->json($major);
    }

    public function store(MajorRequest $request)
    {
        $major = $request->validated()['major'];
        $this->majorService->create($major);

        toastr()->closeButton(true)->success('Data berhasil ditambahkan.');
        return response()->json(['message' => 'Jurusan berhasil ditambahkan.']);
    }

    public function update(MajorRequest $request, int $id)
    {
        $major = $request->validated()['major'];

        try {
            $this->majorService->update($id, $major);
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
            $this->majorService->delete($id);
            toastr()->closeButton(true)->success('Data berhasil dihapus.');
            return redirect()->route('major.view');
        } catch (ModelNotFoundException $e){
            toastr()->closeButton(true)->success('Data gagal dihapus.');
            return redirect()->route('major.view')->with('error', 'Data tidak ditemukan');
        }
    }

    public function students($id)
    {
        $students = Student::where('major_id', $id)->get();
        $major = $this->majorService->getById($id);

        return response()->json([
            'major' => $major,
            'students' => $students,
        ]);
    }
}
