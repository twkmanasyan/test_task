<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index() {
        $students = DB::table("students")
            ->join("users", "students.user_id", "=", "users.id")
            ->select(
                "students.id AS id",
                "students.name AS full_name",
                "students.birth_date AS b_date",
                "students.email AS email",
                "students.phone AS phone",
                "users.first_name AS author"
            )
            ->get();
        $students = $students->toArray();
        return view("dashboard.students.index", ["students" => $students]);
    }

    public function create() {
        return view("dashboard.students.create");
    }

    public function store(Request $request) {
        $data = [
            "name" => $request['full_name'],
            "birth_date" => $request['birth_date'],
            "email" => $request['email'],
            "phone" => $request['phone'],
            "user_id" => Auth::user()->id
        ];

        $store = Student::create($data);
        if($store) {
            return redirect()->route("student-list")->with("success", "Student successfully created.");
        } else {
            return back()->with("fail", "Student was not created!");
        }
    }

    public function details($id) {
        $student = DB::table("students")
            ->join("users", "students.user_id", "=", "users.id")
            ->where("students.id", "=", $id)
            ->select(
                "students.id AS id",
                "students.name AS full_name",
                "students.birth_date AS b_date",
                "students.email AS email",
                "students.phone AS phone",
                "students.created_at AS created_at",
                "users.first_name AS author",
                "users.id AS user_id"
            )
            ->get();
        $student = $student->toArray();
        return view("dashboard.students.details", ['student' => $student[0]]);
    }

    public function edit($id) {
        $student = Student::find($id);
        return view("dashboard.students.edit", ["student" => $student]);
    }

    public function update(Request $request) {
        $student = Student::find($request['student_id']);
        $update = $student->update([
            "name" => $request['full_name'],
            "birth_date" => $request['birth_date'],
            "email" => strtolower($request['email']),
            "phone" => $request['phone'],
        ]);
        if($update) {
            return redirect()
                ->route("student-edit", ['id' => $request['student_id']])
                ->with("success", "Student information successfully changed.");
        }
    }

    public function delete($id) {
        $student = Student::find($id);
        $delete = $student->delete();
        if($delete) {
            return redirect()
                ->route("student-list")
                ->with("success", "Student information successfully changed.");
        }
    }
}
