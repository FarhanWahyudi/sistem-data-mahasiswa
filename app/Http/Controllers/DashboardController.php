<?php

namespace App\Http\Controllers;

use App\Services\MajorService;
use App\Services\StudentService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private StudentService $studentService;
    private MajorService $majorService;

    public function __construct(StudentService $studentService, MajorService $majorService) {
        $this->studentService = $studentService;
        $this->majorService = $majorService;
    }

    public function index()
    {
        $fields = ['id', 'name', 'nim', 'birth_date', 'gender', 'major_id'];

        $students = $this->studentService->getAll($fields);
        $majors = $this->majorService->getAll();
        $totalStudents = $this->studentService->countAll();
        $maleStudents = $this->studentService->countByGender('male');
        $femaleStudents = $this->studentService->countByGender('female');
        $totalMajors = $this->majorService->countAll();

        return view('admin.dashboard', [
            'students' => $students,
            'majors' => $majors,
            'totalStudents' => $totalStudents,
            'maleStudents' => $maleStudents,
            'femaleStudents' => $femaleStudents,
            'totalMajors' => $totalMajors,
        ]);
    }
}
