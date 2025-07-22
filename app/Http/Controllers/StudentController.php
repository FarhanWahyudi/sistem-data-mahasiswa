<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Services\MajorService;
use App\Services\StudentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private StudentService $studentService;
    private MajorService $majorService;

    public function __construct(StudentService $studentService, MajorService $majorService) {
        $this->studentService = $studentService;
        $this->majorService = $majorService;
    }

    public function index()
    {
        $fields = ['id', 'name', 'nim', 'major_id'];
        $students = $this->studentService->getAll($fields);
        $majors = $this->majorService->getAll();

        return view('admin.mahasiswa', [
            'students' => $students,
            'majors' => $majors
        ]);
    }
    
    public function show(int $id)
    {
        $fields = ['id', 'name', 'nim', 'birth_date', 'gender', 'address', 'major_id',];
        $student = $this->studentService->getById($id, $fields);

        return response()->json($student);
    }

    public function store(StudentRequest $request)
    {
        $validated = $request->validated();
        $kecamatan = Str::title($validated['kecamatan']);
        $kabupaten = Str::title($validated['kabupaten']);
        $provinsi = Str::title($validated['provinsi']);

        $data = [
            'nim' => $validated['nim'],
            'name' => Str::title($validated['name']),
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'major_id' => $validated['major'],
            'address' => "Kec. {$kecamatan} Kab. {$kabupaten} Prov. {$provinsi}",
        ];

        $this->studentService->create($data);

        toastr()->closeButton(true)->success('Data berhasil ditambahkan.');
        return response()->json(['message' => 'Jurusan berhasil ditambahkan.']);
    }

    public function update(StudentRequest $request, int $id)
    {
        $validated = $request->validated();
        $kecamatan = Str::title($validated['kecamatan']);
        $kabupaten = Str::title($validated['kabupaten']);
        $provinsi = Str::title($validated['provinsi']);

        $data = [
            'nim' => $validated['nim'],
            'name' => Str::title($validated['name']),
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'major_id' => $validated['major'],
            'address' => "Kec. {$kecamatan} Kab. {$kabupaten} Prov. {$provinsi}",
        ];

        try {
            $this->studentService->update($id, $data);
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
            $this->studentService->delete($id);
            toastr()->closeButton(true)->success('Data berhasil dihapus.');
            return redirect()->route('student.view');
        } catch (ModelNotFoundException $e){
            toastr()->closeButton(true)->success('Data gagal dihapus.');
            return redirect()->route('student.view')->with('error', 'Data tidak ditemukan');
        }
    }

    public function viewPdf()
    {
        $fields = ['id', 'name', 'nim', 'birth_date', 'gender', 'address', 'major_id'];
        $students = $this->studentService->getAll($fields);

        $pdf = Pdf::loadView('pdf.students', [
            'students' => $students
        ]);
        return $pdf->stream('invoice.pdf');
    }
}
