<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Services\MajorService;
use App\Services\StudentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Common\Entity\Row;

class StudentController extends Controller
{
    private StudentService $studentService;
    private MajorService $majorService;

    public function __construct(StudentService $studentService, MajorService $majorService) {
        $this->studentService = $studentService;
        $this->majorService = $majorService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $fields = ['id', 'name', 'nim', 'major_id'];
        $students = $this->studentService->getAll($fields, $search);
        $majors = $this->majorService->getAll();

        return view('admin.mahasiswa', [
            'students' => $students,
            'majors' => $majors,
            'search' => $search
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

    public function exportPdf()
    {
        $fields = ['id', 'name', 'nim', 'birth_date', 'gender', 'address', 'major_id'];
        $students = Student::select($fields)->with(['major:id,name'])->orderBy('name')->get();

        $pdf = Pdf::loadView('pdf.students', [
            'students' => $students
        ]);
        return $pdf->stream('Data Mahasiswa.pdf');
    }

    public function exportExcel()
    {
        $fields = ['id', 'name', 'nim', 'birth_date', 'gender', 'address', 'major_id'];
        $students = Student::select($fields)->with(['major:id,name'])->orderBy('name')->get();

        $writer = new Writer();
        $writer->openToBrowser('Data mahasiswa.xlsx');

        $writer->addRow(Row::fromValues(['NO', 'NIM', 'NAMA', 'TANGGAL LAHIR', 'JURUSAN', 'GENDER', 'ALAMAT']));

        foreach ($students as $index => $student) {
            $writer->addRow(Row::fromValues([
                $index + 1,
                $student->nim,
                $student->name,
                \Carbon\Carbon::parse($student->birth_date)->locale('id')->translatedFormat('d F Y'),
                $student->major->name,
                $student->gender === 'male' ? 'Laki-laki' : 'Perempuan',
                $student->address,
            ]));
        }
        
        $writer->close();
    }
}
